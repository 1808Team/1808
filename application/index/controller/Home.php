<?php
    namespace app\index\controller;

    use think\Controller;
    use app\index\model\commodity;

    class Home extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function index(){

            return $this->fetch("./index");
        }
    }

?>