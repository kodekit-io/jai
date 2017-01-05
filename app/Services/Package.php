<?php

namespace App\Service;


use App\Models\Package as PackageModel;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Package
{
    use DatatableParameters;

    protected $packageType = [
        1 => 'Normal',
        2 => 'Special (Contact Us)'
    ];

    protected $baseUrl = 'package';
    /**
     * @var Galasys
     */
    private $galasys;
    /**
     * @var Holiday
     */
    private $holidayService;

    /**
     * Package constructor.
     * @param Galasys $galasys
     * @param Holiday $holidayService
     */
    public function __construct(Galasys $galasys, Holiday $holidayService)
    {
        $this->galasys = $galasys;
        $this->holidayService = $holidayService;
    }

    public function datatableData()
    {
        $packages = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($packages))
            ->addColumn('title', function($package) {
                return $package->details()->where('lang', 'en')->first()->title;
            })
            ->addColumn('content', function($package) {
                return $package->details()->where('lang', 'en')->first()->content;
            })
            ->addActions($actions)
            ->generate();
    }

    public function all()
    {
        return PackageModel::all();
    }

    public function store(array $inputs)
    {
        $generalAdmission = isset($inputs['is_general_admission']) ? 1 : 0;
        $package = PackageModel::create([
            'package_type_id' => $inputs['package_type_id'],
            'galasys_product_id' => $inputs['galasys_product_id'],
            'normal_price' => $inputs['normal_price'],
            'weekend_price' => $inputs['weekend_price'],
            'holiday_price' => $inputs['holiday_price'],
            'created_by' => Auth::user()->id,
            'is_general_admission' => $generalAdmission,
            'order' => $inputs['order']
        ]);

        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $package->details()->create([
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'PackageDetail'),
                'content' => $content,
                'lang' => $lang
            ]);

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $package->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $package->medias()->attach($mediaId);
        }
    }

    public function getServiceById($id)
    {
        return PackageModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $generalAdmission = isset($inputs['is_general_admission']) ? 1 : 0;
        $package = PackageModel::find($id);
        $package->package_type_id = $inputs['package_type_id'];
        $package->galasys_product_id = $inputs['galasys_product_id'];
        $package->normal_price = $inputs['normal_price'];
        $package->weekend_price = $inputs['weekend_price'];
        $package->holiday_price = $inputs['holiday_price'];
        $package->created_by = Auth::user()->id;
        $package->is_general_admission = $generalAdmission;
        $package->order = $inputs['order'];
        $package->save();

        $package->details()->delete();
        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $package->details()->create([
                'lang' => $lang,
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'PackageDetail'),
                'content' => $content,
            ]);

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $package->metas()->where('meta_key', 'meta_description-' . $lang)->delete();
                $package->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $package->medias()->sync([$mediaId]);
        }
    }

    public function destroy($id)
    {
        PackageModel::destroy($id);
    }

    public function packageTypeSelect($name, $defaultValue = null)
    {
        $form = new FormGenerator();

        $packages = $this->getPackageType();

        $fields = [
            'withBlank' => true
        ];

        if (!is_null($defaultValue)) {
            $fields['selected'] = $defaultValue;
        }
        return $form->dbSelect($packages, $name, $fields, ['class' => 'form-control', 'id' => 'package-type']);
    }

    public function getPackageType()
    {
        return $this->packageType;
    }

    public function getPackage(array $params)
    {
        $query = PackageModel::where('id', '>', 0);

        if (isset($params['id'])) {
            $query = $query->where('id', $params['id']);
        }

        return $query;
    }

    public function getPackages(array $params)
    {
        $packageField = 'package_type_id';
        $createdByField = 'created_by';

        $query = DB::table('packages')
            ->join('package_details', 'packages.id', '=', 'package_details.package_id')
            ->leftJoin('package_has_medias', 'packages.id', '=', 'package_has_medias.package_id')
            ->leftJoin('media', 'package_has_medias.media_id', '=', 'media.id')
            ->select('packages.*', 'package_details.title', 'package_details.content', 'package_details.slug', 'media.file_name')
            ->orderBy('order');

        // search by package type
        if ( isset($params[$packageField]) ) {
            $query->where($packageField, $params[$packageField]);
        }

        // search by creator
        if ( isset($params[$createdByField]) ) {
            $query->where($createdByField, $params[$createdByField]);
        }

        if ( isset($params['is_general_admission'])) {
            $query->where('is_general_admission', $params['is_general_admission']);
        }

        // search by lang
        if (isset($params['lang'])) {
            $lang = $params['lang'];
            $query = $query->where('package_details.lang', $lang);
        }

        return $query->get();
    }

    public function getAllPackages()
    {
        return $this->galasys->getProducts();
    }

    public function getAvailablePackages($visitDateRequest)
    {
        $visitDate = Carbon::createFromFormat('l, d-m-Y', $visitDateRequest)->format('Y-m-d');
        $isHoliday = $this->isHoliday($visitDate);
        $galasysProducts = $this->galasys->getProducts();
        $packages = '';
        $colors = [
            'cyan darken-1',
            'light-blue darken-4',
            'amber darken-1'
        ];
        $x = 0;
        foreach ($galasysProducts as $galasysProduct) {
            $price = ($isHoliday ? $galasysProduct->WeekendPrice : $galasysProduct->BasePrice);
            $description = $galasysProduct->Description;
            $itemCode = $galasysProduct->ItemCode;
            $ticketId = $galasysProduct->TicketID;
            $isPackage = $galasysProduct->IsPackage;
            $today = Carbon::createFromFormat('l, d-m-Y', $visitDateRequest)->format('l');
            $checkAvailabilityWord = 'Is'.$today;
            if ($galasysProduct->$checkAvailabilityWord == 'true') {
                $packages .= '<div class="uk-width-medium-1-3">
                                <div class="uk-panel-box white-text '. $colors[$x] .'">
                                    <h4 class="white-text uk-margin-remove">' . $description . '</h4>
                                    <div class="jai-submission-price">
                                        IDR '. number_format($price, 0) .'
                                    </div>
                                </div>
                                <div class="uk-panel-box jai-submission-order white uk-text-right ">
                                    <input type="hidden" name="products[' . $itemCode . '][id]" value="' . $ticketId .'">
                                    <input type="hidden" name="products[' . $itemCode . '][name]" value="' . $description .'">
                                    <input type="hidden" name="products[' . $itemCode . '][price]" value="' . $price .'">
                                    <input type="hidden" name="products[' . $itemCode . '][isPackage]" value="' . $isPackage .'">
                                    <input type="number" min="0" name="products[' . $itemCode . '][qty]" class="right" value="0">
                                </div>
                            </div>';
            }
            $x++;
        }

        if ($packages == '') {
            $packages = '0';
        }

        return $packages;
    }

    public function isHoliday($date)
    {
        $visitDate = Carbon::createFromFormat('Y-m-d', $date);
        if ($visitDate->isWeekend()) {
            return true;
        }

        $galasysHolidays = $this->galasys->getHolidays();
        $visitDate = $visitDate->format('d/m/Y');
        if (in_array($visitDate, $galasysHolidays)) {
            return true;
        }

        return false;
    }
}