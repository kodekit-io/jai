<?php

namespace App\Service;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Lavary\Menu\Builder;
use Lavary\Menu\Item;
use Menu as LavaryMenu;

class MenuGenerator
{
    /**
     * @var MenuService
     */
    protected $menuService;

    /**
     * SublimeMenuGenerator constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function generateMenu(Request $request, $type = 'backend')
    {
        $function = $type .'Menu';
        return $this->$function($request);
    }

    public function frontendMenu(Request $request)
    {
        $menus = $this->getFrontEndMenus();

        $menu = LavaryMenu::make('FrontendMenu', function($theMenu) use ($menus, $request) {
            foreach ($menus as $menu) {
                // get the 1st level
                if ($menu->parent_id == '0') {
                    $theMenu->add($menu->display)
                        ->nickname($menu->name)
                        ->data(['icon_class' => $menu->icon_class, 'menu_link' => $menu->link]);
                } else {
                    $parentMenu = $this->menuService->getMenuById($menu->parent_id);
                    $theMenu->get($parentMenu->name)
                        ->add($menu->display)
                        ->nickname($menu->name)
                        ->data(['icon_class' => $menu->icon_class, 'menu_link' => $menu->link]);
                }

                $currentLang = session()->get('lang');

                $langLink = $currentLang . '/' . $menu->link;
                if ($request->is($langLink)) {
                    // $theMenu->item($menu->name)->data('activated', 'active');
                    $theMenu->item($menu->name)->active();
                    $this->activateItem($theMenu, $menu->id);
                }
            }
        });

        return $menu;
    }

    function backendMenu(Request $request)
    {
        $user = Auth::user();
        $menus = $this->getMenuByUserId($user->id);

        $menu = LavaryMenu::make('MyNavBar', function($theMenu) use ($menus, $request) {
            foreach ($menus as $menu) {
                // get the 1st level
                if ($menu->parent_id == '0') {
                    $theMenu->add($menu->display)
                        ->nickname($menu->name)
                        ->data(['icon_class' => $menu->icon_class, 'menu_link' => $menu->link]);
                } else {
                    $parentMenu = $this->menuService->getMenuById($menu->parent_id);
                    $theMenu->get($parentMenu->name)
                        ->add($menu->display)
                        ->nickname($menu->name)
                        ->data(['icon_class' => $menu->icon_class, 'menu_link' => $menu->link]);
                }

                if ($request->is($menu->link)) {
                    // $theMenu->item($menu->name)->data('activated', 'active');
                    $theMenu->item($menu->name)->active();
                    $this->activateItem($theMenu, $menu->id);
                }
            }
        });

        return $menu;
    }

    private function getMenuByUserId($userId)
    {
        return $this->menuService->getMenuByUser($userId);
    }

    function activateItem(Builder $item, $menuId, $first = true)
    {
        $menu = $this->menuService->getMenuById($menuId);

        if (! $first) {
            // $item->item($menu->name)->data('activated', 'active');
            $item->item($menu->name)->active();
        }

        if ($menu->parent_id != '' && $menu->parent_id != '0') {
            $this->activateItem($item, $menu->parent_id, false);
        }

    }

    private function getFrontEndMenus()
    {
        return $this->menuService->getFrontEndMenus();
    }
}
