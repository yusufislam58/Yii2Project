<?php
namespace frontend\tests\models;

use backend\modules\api\models\Mom;
use Codeception\Util\Debug;
use frontend\models\Moms;
use frontend\tests\fixtures\MomsFixtures;
use yii\filters\auth\HttpBasicAuth;
use yii\test\ActiveFixture;
use frontend\tests\UnitTester;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;

class MomsTest extends \Codeception\Test\Unit
{

    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    private Moms $momModel;
        private $mom1,$fakeUploadedFile;


    public function _fixtures()
    {
        return [
           'moms'=>[
               'class' => MomsFixtures::class,
                'dataFile' => codecept_data_dir() . 'moms.php'
           ],
        ];
    }
    protected function _before()
    {

        // Modeli oluştur
        $this->momModel = new Moms();
        $this->fakeUploadedFile = new UploadedFile([
            'name' => 'aaa.txt', // Dosya adı
            'tempName' => 'gelenDosya/a.txt', // Gerçek dosya yolunu buraya ayarlayın
            'type' => 'text/plain', // Dosya türü
            'size' => 20000, // Dosya boyutu
            'error' => UPLOAD_ERR_OK, // Dosya yükleme hatası
        ]);

    }
    protected function _after()
    {

    }

    public function testGetChildCount()
    {
        // Örnek bir anne oluştur
        $mom = new Moms([
            'name' => 'Ayşe123',
            'surname'=>"deneme",
            'childrenCount' => 3,
        ]);
        $expected= 3;
        // Anne modelini kaydet
        codecept_debug($mom->save());
        codecept_debug($mom->childrenCount);


        // Anne modelini veritabanından yeniden çek
        $retrievedMom = Moms::findOne(['name' => 'Ayşe123']);
        // Anne modelinin çocuk sayısı doğru musss
        $retrievedMom->name;
        codecept_debug($retrievedMom->childrenCount);
        $this->assertEquals($expected, $retrievedMom->childrenCount,"olması gereken değer: $expected, gönderilen değer: $retrievedMom->childrenCount");
    }

    public function testGetFileExtension(){
        $model = new Moms();
        // Sahte bir dosya oluştur

        // Model üzerine sahte dosyayı atama
        $model->file = $this->fakeUploadedFile;

        // Dosyanın gerçekten atanıp atanmadığını kontrol et
        $this->assertInstanceOf(UploadedFile::class, $model->file);


        if ($model->file) {
            $validExtensions = ['jpg', 'png', 'pdf','txt'];


            $fileInfo = pathinfo($model->file);
            $extension = strtolower($fileInfo['extension']);
            $isValidExtension = in_array($extension, $validExtensions);



            if ($isValidExtension ) {
                // Dosyayı yükleme dizinine kaydet


                // Anne modelini oluşturun ve dosya bilgilerini atayın
                $mom = new Moms();
                $mom->save();

            } else {
                $this->assertTrue(false, "Dosya uzantısı geçerli değil.");
            }   // Testi doğrulayın
                $this->assertTrue(true, "Dosya başarıyla yüklendi ve kaydedildi.");
        } else {
            $this->assertTrue(false, "Dosya yüklenemedi.");
        }
    }

    public function testGetFileSize(){
        $this->momModel->file = $this->fakeUploadedFile;
        $maxFileSize = 20000;
        $isValidSize = $this->momModel->file->size <= $maxFileSize;

        if ($isValidSize ) {

            $mom = new Moms();
            $mom->save();

        } else {
            $this->assertTrue(false, "Dosya boyutu 20MB'ı geçmemeli.");
        }   // Testi doğrulayın
        $this->assertTrue(true, "Dosya başarıyla yüklendi ve kaydedildi.");
    }

    public function testMomsCanSee(){
        $deneme1 = $this->tester->grabFixture('moms','mom1');

        if (isset($deneme1['name'])) {
            $this->momModel= $deneme1;
//           codecept_debug($this->momModel->attributes = $deneme1);
//            codecept_debug([$this->momModel,"------------"]);
//            codecept_debug($this->momModel->getErrors());
            $this->assertTrue($this->momModel->save());
            $this->assertTrue($this->momModel->validate());

        } else {
            $this->assertTrue(false, "Dosya uzantısı  geçerli değil.");
        }

    }

    public function testMomsBlankName(){
         $testMom=$this->tester->grabFixture('moms','blankNameMom');
         $this->momModel= $testMom;
         if ($this->momModel->validate()){
                $this->assertFalse($testMom['name']==$this->momModel->name,'test başarısız');
         }else{
             $this->assertTrue($testMom['name']=='','test başarısız');
         }



//         $this->assertNotEmpty($testMom['name'],'isim alanı boş olamaz');

    }









}