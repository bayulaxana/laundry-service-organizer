<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->setTitle("Halaman Awal");
        $this->view->setTemplateAfter("main-layout");
        $this->loadLandingPageAssets();
    }

    public function loginAction()
    {
        $this->tag->setTitle("Masuk");
        $this->view->setTemplateAfter("main-layout");
    }

    private function loadLandingPageAssets()
    {
        // Load Javascript
        $this->assets->addJs('js/index/carousel.js');

        // Load CSS
        $this->assets->addCss('css/index/carousel.css');
    }
}

