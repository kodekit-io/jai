<?php

namespace App\Service;


class FrontEndService
{
    /**
     * @var Slider
     */
    private $slider;
    /**
     * @var Post
     */
    private $post;
    /**
     * @var Package
     */
    private $package;

    /**
     * FrontEndService constructor.
     * @param Slider $slider
     * @param Post $post
     * @param Package $package
     */
    public function __construct(Slider $slider, Post $post, Package $package)
    {
        $this->slider = $slider;
        $this->post = $post;
        $this->package = $package;
    }

    public function slider()
    {
        return $this->slider;
    }

    public function post()
    {
        return $this->post;
    }

    public function package()
    {
        return $this->package;
    }
}