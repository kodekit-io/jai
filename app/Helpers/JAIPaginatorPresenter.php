<?php

namespace App\Helpers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;

class JAIPaginatorPresenter extends AbstractPaginator implements Paginator
{


    /**
     * The URL for the next page, or null.
     *
     * @return string|null
     */
    public function nextPageUrl()
    {
        // TODO: Implement nextPageUrl() method.
    }

    /**
     * Determine if there is more items in the data store.
     *
     * @return bool
     */
    public function hasMorePages()
    {
        // TODO: Implement hasMorePages() method.
    }

    /**
     * Render the paginator using a given view.
     *
     * @param  string|null $view
     * @return string
     */
    public function render($view = null)
    {
        // TODO: Implement render() method.
    }
}