<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_gateway extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //Load required model :-
        //$this->load->model('Report');
        $this->load->library('easebuzz_payment');

        //Confirm Form Resubmission Error solution
        header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');
    }

    public function index()
    {
       $this->load->view('index');
    }
    public function pay()
    {
        if(isset($_POST['btn_pay']))
        {
            $params = array();
            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            $params['txnid'] = $txnid;
            $params['api_name'] = "initiate_payment";
            $params['amount'] = sprintf("%.2f", $_POST['amount']);
            $params['firstname'] = $_POST['firstname'];
            $params['email'] = $_POST['email'];
            $params['phone'] = $_POST['phone'];
            $params['productinfo'] = $_POST['productinfo'];
            $params['surl'] = base_url()."Payment_gateway/success";
            $params['furl'] = base_url()."Payment_gateway/fail";

            $MERCHANT_KEY = "A92FULVHOP"; //"1WMBXRIJVG";//
            $SALT = "GRE7GR7J14";//"HCL2JBFP3K";//"GRE7GR7J14";
            $ENV = "test";  //"prod";//"test";  

            $this->easebuzz_payment->initiate_payment($params, $MERCHANT_KEY, $SALT, $ENV);

        }
        else
        {
            $this->index();
        }
    }
    public function success()
    {
        echo 'Payment successfull';
        $SALT = "GRE7GR7J14";//"HCL2JBFP3K";//"GRE7GR7J14";
        $result = $this->easebuzz_payment->response($_POST, $SALT);
        print_r($result);
    }
    public function fail()
    {
        echo 'Sorry Payment failed';
    }
}

?>
