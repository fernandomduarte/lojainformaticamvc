<?php
class homeController extends Controller {

    private $user;

    public function __construct() {
        parent::__construct();

        $this->user = new Users();

        if (!$this->user->checkLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }

    public function index() {
        $data = array();
        $s = '';

        $p = new Products();

        if (!empty($_GET['search'])) {
            $s = $_GET['search'];
        }
        $data['list'] = $p->getProducts($s);

        $this->loadTemplate('home', $data);
    }

}