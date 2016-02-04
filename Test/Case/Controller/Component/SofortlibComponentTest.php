<?php
App::uses('SofortlibComponent', 'SofortCom.Controller/Component');

/**
 * Encryption and Decryption Tests
 */
class SofortlibComponentTest extends CakeTestCase {

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp(){
		parent::setUp();
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown(){
		parent::tearDown();
	}

	private function getRandomShopId(){
		return String::uuid();
	}

	/**
	 * @group combined
	 */
	public function testEncryptDecrypt(){
		$shopId = 72;
		$enc = SofortlibComponent::EncryptShopId($shopId);

		// simulate CakePHP's URL param decoding
		$urlParam = urldecode($enc);

		$dec = SofortlibComponent::DecryptShopId($urlParam);
		$this->assertEquals($shopId, $dec);
	}

	/**
	 * @group combined
	 */
	public function testEncryptDecrypt10000RandomIds(){
		for($i=0; $i<10000; $i++){
			$shopId = $this->getRandomShopId();

			$enc = SofortlibComponent::EncryptShopId($shopId);

			// simulate CakePHP's URL param decoding
			$urlParam = urldecode($enc);

			$dec = SofortlibComponent::DecryptShopId($urlParam);
			$this->assertEquals($shopId, $dec);
		}
	}

}
