<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Install extends BaseController {

		function __construct()
			{
				View::share('bStrapCss', asset('assets/components/bootstrap/bootstrap.min.css'));
				View::share('styleCss', asset('assets/css/install.css'));
				View::share('siteTitle', 'MalMan Kurulum Sihirbazı');
			}

		public function Home()
			{
				if (file_exists("lock"))
					return Redirect::to('/');
				else {
					$data = array(
						'title' => 'Hoşgeldiniz!',
						'formAction' => action('Install@Step2')
						);
					return View::make('install/step1', $data);
				}
			}

		public function Step2()
			{
				// Veritabanı Ayar Dosyası İçeriği
					$sampleFile 	= "app/config/dbSample.php";
					$dbFile 		= "app/config/database.php";
					$sampleFile 	= file_get_contents($sampleFile);

				// Post ile Gelen Veriyi Replace Et
					$sampleFile 	= str_replace('sampledbhost', Input::get('dbhost'), $sampleFile);
					$sampleFile 	= str_replace('sampledbuser', Input::get('dbuser'), $sampleFile);
					$sampleFile 	= str_replace('sampledbpass', Input::get('dbpass'), $sampleFile);
					$sampleFile 	= str_replace('sampledbname', Input::get('dbname'), $sampleFile);
					if (empty(Input::get('dbpfix'))) $dbPrefix = 'up_';
					else $dbPrefix = Input::get('dbpfix');
					$sampleFile 	= str_replace('sampledbpfix', $dbPrefix, $sampleFile);

				// Ayar Verilerini Dosyaya Yaz
					 $dbFile 		= fopen($dbFile, "w");
									  fwrite($dbFile, $sampleFile);
									  fclose($dbFile);

				// Verileri Şablona Gönder
					$data = array(
						'title' => 'Yönetici Ayarları',
						'formAction' => action('Install@Step3')
						);

				// DB Bağlantısını Kontrol Et
					try{
						DB::connection()->getDatabaseName();
						$data["dbStatus"] = DB::connection()->getDatabaseName() . " veritabanına bağlantı başarılı";
						$this->TableCreator();
						return View::make('install/step2', $data);
					}catch(PDOException $e){
						return Redirect::route('installStep1')->with('dbStatus', 'Veritabanına bağlanılamadı!');
					}
			}

		public function Step3()
			{
				DB::table('yoneticiler')->truncate();

				$YoneticiMdl = new YoneticiMdl;
				$YoneticiMdl->email = Input::get('userMail');
				$YoneticiMdl->sifre = Crypt::encrypt(Input::get('userPass'));
				$YoneticiMdl->save();

				$data['title'] 		= 'Site Ayarı!';
				$data['formAction']	= action('Install@Step4');
				return View::make('install/step3', $data);
			}

		public function Step4()
			{
				DB::table('ayarlar')->truncate();
/*
				$firstSet = array(
					'baslik' 	=> Input::get('siteTitle'),
					'iletisim' 	=> Input::get('siteMail'),
					'kelimeler' => Input::get('metaKeys'),
					'aciklama' 	=> Input::get('metaDesc'),
					'analytics' => Input::get('siteAnalytics'),
					'durum' 	=> Input::get('siteStatus'),
					'facebook' 	=> Input::get('siteFace'),
					'twitter' 	=> Input::get('siteTwit')
				);
*/
				$setUpMdl = new AyarlarMdl;
				$setUpMdl->baslik 		= Input::get('siteTitle');
				$setUpMdl->iletisim 	= Input::get('siteMail');
				$setUpMdl->kelimeler 	= Input::get('metaKeys');
				$setUpMdl->aciklama 	= Input::get('metaDesc');
				$setUpMdl->analytics 	= Input::get('siteAnalytics');
				$setUpMdl->durum 		= Input::get('siteStatus');
				$setUpMdl->facebook 	= Input::get('siteFace');
				$setUpMdl->twitter 		= Input::get('siteTwit');
				$setUpMdl->save();
				touch("lock");

				$data['title'] 		= 'Tebrikler!';
				$data['homeLink']	= action('Anasayfa@index');
				$data['adminLink']	= action('Admin@index');
				return View::make('install/step4', $data);
			}

		public function TableCreator()
			{
			//DELETE EXISTS TABLES
				if (Schema::hasTable('kategoriler')) 	Schema::drop('kategoriler');
				if (Schema::hasTable('urunler')) 		Schema::drop('urunler');
				if (Schema::hasTable('kullanicilar')) 	Schema::drop('kullanicilar');
				if (Schema::hasTable('sayfalar')) 		Schema::drop('sayfalar');
				if (Schema::hasTable('yorumlar')) 		Schema::drop('yorumlar');
				if (Schema::hasTable('yoneticiler')) 	Schema::drop('yoneticiler');
				if (Schema::hasTable('ayarlar')) 		Schema::drop('ayarlar');

			// CREATE TABLE STRUCTURE
				Schema::create('kategoriler', 	function(Blueprint $table)
					{
						$table->increments('id');
						$table->integer('ust_kat');
						$table->string('baslik',500);
						$table->string('sef',500);
					});

				Schema::create('urunler', 		function(Blueprint $table)
					{
						$table->increments('id');
						$table->integer('kategori');
						$table->string('baslik',500);
						$table->text('aciklama');
						$table->string('fiyat',500);
						$table->string('sef',500);
						$table->timestamps();
					});
				
				Schema::create('kullanicilar', 	function(Blueprint $table)
					{
						$table->increments('id');
						$table->string('email',500);
						$table->string('sifre',500);
						$table->integer('aktivasyon');
						$table->string('ad',500);
						$table->string('soyad',500);
						$table->text('adres');
						$table->integer('il');
						$table->integer('ilce');
						$table->string('cep',500);
						$table->string('dogum',500);
						$table->integer('cinsiyet');
						$table->timestamps();
					});

				Schema::create('yorumlar', 		function(Blueprint $table)
					{
						$table->increments('id');
						$table->integer('urun_id');
						$table->integer('yazar');
						$table->text('yorum');
						$table->timestamps();
					});

				Schema::create('sayfalar', 		function(Blueprint $table)
					{
						$table->increments('id');
						$table->string('baslik', 500);
						$table->text('icerik');
						$table->integer('durum');
						$table->string('sef',500);
					});

				Schema::create('yoneticiler', 	function(Blueprint $table)
					{
						$table->increments('id');
						$table->string('email', 500);
						$table->string('sifre', 500);
						$table->integer('grup');
						$table->timestamps();
					});

				Schema::create('ayarlar', 		function(Blueprint $table)
					{
						$table->increments('id');
						$table->string('baslik', 500);
						$table->string('iletisim', 500);
						$table->text('kelimeler');
						$table->text('aciklama');
						$table->text('analytics');
						$table->integer('durum');
						$table->string('facebook', 500);
						$table->string('twitter', 500);
					});
			}
		
		public function Error()
			{
				return View::make('install/getError')
					->with('title','Direk erişim hatası!');
			}
	}

?>