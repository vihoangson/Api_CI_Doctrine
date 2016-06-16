<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$p = new Entities\Product;
		$p->setName("Son dep trai".sha1(time().microtime(true)));
		$p->setGioitinh("Nam");
		$this->em->persist($p);
		$this->em->flush();
		$products = $this->em->getRepository('Entities\Product')->findAll();
		$ResP = $this->em->getRepository('Entities\Product');
		echo "<pre>";
		print_r($ResP->getProductArrayById(1));
		print_r($ResP->getAllProductArrays());
		echo "</pre>";


		die;
		$this->load->view('welcome_message', array('products' => $products));
	}
}
