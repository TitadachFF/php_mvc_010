<?php

use App\Controllers\Client\BaseController;

class PhonesController extends BaseController
{

    private $phoneModel;
    private $brandsModel;

    public function __construct()
    {
        $this->loadModel('PhonesModel');
        $this->phoneModel = new PhonesModel;
    }

    /**
     * path name: folderName.fileName or folderName/fileName
     */
    public function index()
    {
        if (!isset($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number = $_GET['page'];
        }
        
        if (!isset($_GET['ma_hang'])) {
            $brand_id = '';
        } else {
            $brand_id = $_GET['ma_hang'];
        }

        // so san pham tren 1 trang
        $limit = 10;

        // lay so trang 
        $initial_page = ($page_number - 1) * $limit;

        $total_rows = $this->phoneModel->countRows($brand_id);

        $total_pages = ceil($total_rows / $limit);

        if($brand_id == '') {
            $phones = $this->phoneModel->getAll($initial_page, $limit);
        }
        else {
            $phones = $this->phoneModel->filterByBrand($initial_page, $limit, $brand_id);
        }

        $this->loadModel('BrandsModel');
        $this->brandsModel = new BrandsModel;
        $brands = $this->brandsModel->getAll();

        return $this->view('Client.phones.index', [
            'phones' => $phones,
            'brands' => $brands,
            'total_pages' => $total_pages,
        ]);
    }
}
