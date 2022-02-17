<?php

namespace Database\Seeders;

use App\Models\SkinType;
use Illuminate\Database\Seeder;

class SkinTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
[
'name' => 'SFML',
'ingredients_text' => 'Sebaiknya gunakan bahan yang mampu memberikan hidrasi penting dan memiliki sifat menenangkan demi melawan kekeringan dan peradangan yang kamu alami. Pakai juga skin-brightening dan bahan kaya akan antioksidan agar menepis serangan radikal bebas. Selain itu, pakailah jenis ingredients seperti tabel di atas ya!

Hindari pemakaian bahan yang menyebabkan kulitmu jadi tambah kering, inflamasi atau kemerahan, tanda-tanda muncul iritasi, dan menyumbat pori-pori. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamSFML sebaiknya menggunakan produk seperti krim, cleansing kaya lipid yang tidak berbusa, pelembab yang mampu memperbaiki skin barrier, dan produk perawatan khusus untuk masalah kulit yang unik seperti jerawat, rosacea, atau melasma.

Apa kamu pernah mengalami iritasi atau kemerahan pada saat cuci muka? Coba kamu pertimbangkan pakai air yang sudah disaring atau cleansing water untuk membilas wajahmu. Karena, kandungan kalsium dan mineral yang terdapat pada air keran yang keras, dapat menyebabkan iritasi pada beberapa jenis kulit sensitif, lho!

Selain itu, tipe kulitmu yang rawan akan jerawat, bisa menggunakan bahan retinoid sebagai salah satu pilihan treatmentmu. Meskipun hal itu harus dilakukan bertahap ya, misalkan dimulai dengan aplikasi 3 hari sekali tetapi jika mulai mengalami kekeringan, pengelupasan, kemerahan, atau perih, gunakan lebih jarang.

Jangan pakai product foaming cleanser ya, karena kulit kamu akan semakin kering dan kemerahan. Hindari juga penggunaan physical exfoliater , seperti scrub wajah yang keras, karena gesekan yang disebabkan oleh produk ini dapat memperburuk kekeringan dan iritasi, terutama ketika kamu sedang berjuang dengan jerawat atau rosacea.

Hal wajib yang tidak boleh di skip yaitu pakai setiap hari adalah sunscreen dengan SPF minimal 15, 30, atau lebih tinggi saat kamu berada di luar ruangan.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit SFML yaitu Kering, Sensitif, Mudah Terpigmentasi dan Berkerut.

Kulitmu ini tergolong memiliki hambatan yang paling kompleks dan menantang untuk mencapai kulit yang sehat. Tipe kulitmu yang kering memiliki skin barrier yang tidak baik, yang berarti kulit kamu mengalami kesulitan untuk menahan air, dan menjaga iritasi serta alergen agar tidak menembus ke lapisan yang lebih dalam. Gunakan pelembap yang dapat memperbaiki skin barrier-mu yang rusak sehingga bisa mengembalikan fungsinya.

Tentunya kulit sensitifmu rentan dengan inflamasi atau peradangan. Jerawat dan rosacea rentan muncul, karena inflamasi yang pada dasarnya terjadi pada tipe kulitmu.

Peradangan juga dapat menyebabkan dispigmentasi, bintik hitam dan warna kulit tidak merata. Sinar matahari juga dapat memperburuk masalah pigmentasi, karena sinar UV matahari memicu kulitmu untuk memproduksi lebih banyak melanin (pigmen yang memberi warna pada kulitmu).

Terakhir, kulitmu juga rentan terhadap kerutan dan tanda-tanda penuaan lainnya, serta peningkatan risiko kanker kulit akibat paparan sinar matahari. Jika kamu sudah pernah konsultasi dengan dokter kulit, pastikan untuk tetap konsisten melakukan pemeriksaan ya!'
],
[
'name' => 'SFMC',
'ingredients_text' => 'Material terbaik untuk tipe kulitmu yaitu yang mampu memberikan hidrasi penting, memiliki sifat menenangkan demi melawan kekeringan dan inflamasi yang kamu alami, dan memiliki efek mencerahkan kulit. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan yang dapat mengeringkan kulit atau memicu inflamasi dan pigmentasi. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'Untuk #TeamSFMC pertimbangkan pemakaian cleansing water saat membilas wajahmu jika kamu rentan terhadap kemerahan dan iritasi. Pakai juga pelembab yang dapat memperbaiki skin barrier, sehingga kulitmu bisa terhidrasi.

Gunakan produk yang mengandung banyak bahan anti-inflamasi seperti Argan Oil, Niacinamide, serta Antioksidan seperti Vit C, polifenol, dan resveratrol.

Kamu wajib menghindari penggunaan foaming cleanser karena bisa menyebabkan kulit terasa semakin kering. Hindari juga penggunaan kosmetik dengan eksfoliator fisik.

Terakhir, kamu wajib pakai sunscreen setiap hari dan rutin menggunakan moisturizer demi menjaga kelembaban kulitmu.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit SFMC yang Kering, Sensitif, Mudah Terpigmentasi, dan Kencang.

Keuntungan dari tipe kulit SFMC adalah kulit yang kencang, artinya kulit kamu tidak rentan terhadap kerutan ataupun penuaan.

Pertahankan kebiasaan sun-protection agar kulit tetap kencang. Kelola stres kamu, makan makanan yang sehat, dan tidak merokok, untuk menjaga kulitmu agar tetap halus dan bebas kerut!

Namun, kamu memiliki skin barrier yang kurang baik karena tipe kulitmu yang kering, sehingga sulit untuk menyimpan air. Tipe kulitmu yang sensitif juga rentan terkena inflamasi serta masalah jerawat, eksim, dan rosacea. Terakhir, kulitmu mudah terpigmentasi sehingga kamu akan mengalami masalah warna kulit yang tidak merata.

'
],
[
'name' => 'SIML',
'ingredients_text' => 'Cara merawat kulit untuk SIML yaitu dengan menggunakan bahan yang menghidrasi, mencerahkan bintik hitam, dan mengatasi tanda-tanda penuaan. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan perawatan kulit yang dapat memperburuk kekeringan wajahmu. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'SIML dan jenis kulit kering lainnya harus menggunakan krim pembersih non-busa yang menyimpan lipid ke kulit. Pembersih asam hidroksi dapat digunakan untuk menghaluskan permukaan kulit, meskipun jenis kulit kering mungkin tidak dapat mentolerir pembersih asam hidroksi setiap hari.

Selain itu, dengan scrub wajah dapat memperbaiki tekstur kulit kasar atau tidak rata, tetapi sebaiknya hanya digunakan dua hingga tiga kali per minggu ya!

Untuk mengembalikan fungsi penghalang yang tepat, gunakan pelembab skin barrier dua kali sehari. Produk perawatan lainnya: pencerah kulit, retinoid, antioksidan, dan produk anti penuaan.

Semua jenis kulit termasuk SIML harus menggunakan tabir surya harian minimal SPF 15 atau SPF 30 atau lebih tinggi saat berada di luar ruangan.

Hindari juga penggunaan toner mengandung alkohol ya.

Remember that, my dear!',
'solution' => 'Wah kamu punya kulit SIML yaitu Kering, Tahan, Mudah Terpigmentasi, dan Keriput.

Mengapa SIML memiliki kulit yang tahan? Karena jika terjadi peradangan, kemerahan, bintik hitam, warna kulit tidak merata, hingga terjadi inflamasi seperti jerawat dan rosacea bukan jadi masalah besar bagi #TeamSIML

Sayangnya, kamu memiliki masalah dehidrasi, mudah terpigmentasi, dan adanya tanda-tanda penuaan. Dehidrasi dan kekeringan disebabkan oleh gangguan penghalang kulit, yang dapat diperbaiki dengan pelembab. Masalah pigmentasi seperti bintik hitam dan warna kulit tidak merata terjadi ketika melanosit memproduksi terlalu banyak melanin, pigmen yang memberi warna pada kulit wajahmu. Jika kamu berusia 30 tahun atau jarang menggunakan tabir surya akan lebih mudah mengalami tanda-tanda penuaan seperti garis dan kerutan.'
],
[
'name' => 'SIMC',
'ingredients_text' => 'Cara merawat kulit untuk SIMC yaitu dengan mengembalikan fungsi skin barrier, serta mencerahkan warna kulit tidak merata dan gunakan produk yang menenangkan kulit kering atau gatal. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan perawatan kulit yang memperburuk kekeringan dan menyebabkan iritasi. Selain itu, hindari estrogen topikal dan bahan lain yang dapat memperburuk bintik hitam. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamSIMC harus menggunakan pembersih non-busa yang tidak akan menghilangkan minyak dari kulit. Sebagai gantinya, pilihlah pembersih yang lembut dan menghidrasi yang dapat membantu memberikan minyak penting yang dibutuhkan oleh jenis kulit kering.

Gunakan pelembab khusus skin barrier dua kali sehari untuk mempertahankan kelembaban dan mencegah iritasi pada kulit.

Produk pencerah kulit dapat membantu memperbaiki tampilan bintik hitam dan warna kulit yang tidak merata. Gunakan juga tabir surya tiap hari minimal SPF 15 atau SPF 30 atau lebih tinggi saat di luar ruangan ya!

SIMC dan jenis kulit kering lainnya tidak boleh menggunakan pembersih berbusa, toner yang mengandung alkohol, atau produk lain yang dapat menyebabkan kekeringan dan iritasi.

Remember that, my dear!',
'solution' => 'Wah kamu punya kulit SIMC yaitu Kering, Tahan, Mudah Terpigmentasi dan Kencang.

Dua masalah utama, kekeringan dan mudah terpigmentasi, cara termudah adalah mengendalikan dehidrasi untuk kulit SIMC. Kekeringan berlebih akan menyebabkan gatal dan mengelupas, dan beberapa SIMC mungkin mengalami eksim, suatu kondisi kulit yang ditandai dengan kulit yang gatal, kasar, dan teriritasi.

Kabar baiknya bukan jadi masalah besar bagi #TeamSIMC ketika terjadi peradangan dan tanda-tanda penuaan seperti garis dan kerutan

Masalah mudah terpigmentasi seperti warna kulit tidak merata dan penggelapan area kulit yang terkena kekeringan dan eksim juga sangat umum terjadi pada jenis kulit ini.'
],
[
'name' => 'SFDL',
'ingredients_text' => 'Sebaiknya gunakan bahan yang mampu memberikan hidrasi penting dan memiliki sifat menenangkan demi melawan kekeringan dan peradangan yang kamu alami. Bahan lainnya yang kaya akan antioksidan agar menepis serangan radikal bebas. Selain itu, pakailah jenis ingredients seperti tabel di atas ya!

Hindari pemakaian bahan yang menyebabkan kulitmu jadi tambah kering, iritasi kemerahan atau terbakar. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamSFDL sebaiknya menggunakan pelembab yang mampu memperbaiki skin barrier, cleansing yang tidak berbusa atau air yang disaring secara khusus agar tidak terasa perih dan terbakar.

Saat mandi, kamu bilas terlebih dahulu sampo dan kondisioner sebelum mencuci muka ya, supaya kamu bisa menghindari potensi iritasi dari produk rambut kamu.

Tipe kulitmu yang rawan akan jerawat, bisa menggunakan bahan retinoid, retinol, atau bakuchiol sebagai salah satu pilihan treatmentmu. Meskipun hal itu harus dilakukan bertahap yaa, misalkan dimulai dengan aplikasi 3 hari sekali. Lalu kamu naikkan frekuensinya. Jika kamu mulai mengalami kekeringan, pengelupasan, kemerahan, atau perih, gunakan lebih jarang.

Jangan pakai product foaming cleanser ya, karena akan menyebabkan kulit semakin kering dan kemerahan, apalagi jika mengandung bahan detergen anionik. Hindari juga penggunaan physical exfoliater, seperti scrub wajah yang keras, karena gesekan yang disebabkan oleh produk ini dapat memperburuk kekeringan dan iritasi, terutama ketika kamu sedang berjuang dengan jerawat atau rosacea.

Hal yang wajib kamu pakai setiap hari adalah sunscreen dengan SPF minimal 15, 30, atau lebih tinggi baik di dalam maupun di luar ruangan. Ingat, sinar UV bisa menembus kaca, lho.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit SFDL yaitu Kering, Sensitif, Tidak Mudah Terpigmentasi dan Berkerut.

Cukup menantang bagi tipe kulitmu karena kamu punya 3 hambatan. Tapi tenang aja, kabar baik untuk tipe kulitmu, dark spot, warna kulit yang tidak merata, melasma, dan masalah pigmentasi lainnya tidak menjadi masalah besar untukmu. Pakai sunblock secara konsisten, dan hindari tanning/penyamakan dapat membantu kamu untuk mempertahankan warna dan tekstur kulit yang merata.

Tipe kulitmu yang kering memiliki skin barrier yang tidak baik, yang berarti kulit kamu mengalami kesulitan untuk menahan air, dan menjaga iritasi serta alergen agar tidak menembus ke lapisan yang lebih dalam. Kulit sensitifmu rentan dengan inflamasi atau peradangan. Selain itu jerawat, rosacea dan kerutan juga rentan muncul, Produk perawatan yang tepat akan tergantung pada apakah kamu menderita jerawat atau rosacea, meskipun secara umum, bahan anti-inflamasi dapat mengurangi kemerahan dan mampu menenangkan kulitmu.'
],
[
'name' => 'SFDC',
'ingredients_text' => 'Material terbaik untuk tipe kulit kamu, sebaiknya yang mampu memberikan hidrasi penting dan memiliki sifat menenangkan demi melawan kekeringan dan peradangan yang kamu alami. Apalagi biasanya tipe kulitmu cenderung berjerawat, pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan yang menyebabkan kulitmu jadi tambah kering dan inflamasi. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamSFDC bisa menggunakan produk cleanser yang tidak berbusa (non-foaming cleanser), pelembab untuk memperbaiki skin barrier, dan produk yang cenderung memiliki bahan anti inflamasi atau antioksidan.

Pertimbangkan pakai air yang sudah disaring atau cleansing water untuk membilas wajahmu. Karena, kandungan kalsium dan mineral yang terdapat pada air keran yang keras, dapat menyebabkan iritasi pada beberapa jenis kulit sensitif, lho!

Jangan pakai product foaming cleanser ya, karena kulit akan jadi semakin kering dan kemerahan. Selain itu, tipe kulitmu yang rawan akan jerawat, bisa menggunakan bahan retinoid sebagai salah satu pilihan treatmentmu. Meskipun hal itu harus dilakukan bertahap, misalnya dimulai dengan aplikasi 3 hari sekali.

Selain itu ada proses aklimatisasi dimana kamu tidak boleh menggunakan pelembab yang mengandung asam hialuronat. Asam tersebut bisa meningkatkan penetrasi retinoid, dan membuat kulit mengalami efek samping seperti kekeringan dan pengelupasan yang semakin parah. Sebagai gantinya, kamu bisa mulai dengan mengoleskan retinoid di atas pelembab untuk memperbaiki skin barrier demi memperlambat tingkat penyerapan.

Hal wajib untuk kamu pakai setiap hari adalah sunscreen dengan SPF minimal 15, 30, atau lebih tinggi saat kamu berada di luar ruangan.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit SFDC yaitu Kering, Sensitif, Tidak Mudah Terpigmentasi dan Kencang.

Kelemahan kulit SFDC yang kering dan sensitif membuatnya rentan mengalami dehidrasi dan inflamasi. Itulah yang membuat kamu jadi sering berjerawat, rentan terkena rosacea, eksim, dan lainnya. Kalau kamu menggunakan komposisi skincare yang tepat, seperti pelembab yang mampu memperbaiki skin barrier dan bahan anti-inflamasi, kamu bisa mengatasi masalah ini demi menuju kulit yang sehat dan bersih!

Kulit keringmu memiliki skin barrier yang tidak baik. Hilangnya kelembaban dan inflamasi sering terjadi, disebabkan oleh iritan dan alergen yang mampu menembus lapisan luar kulit kesayanganmu.

Kamu juga wajib berhati-hati karena kulit sensitifmu rentan terjadi peradangan. Jangan lupa, jauhi berjemur di dalam maupun di luar ruangan demi menjaga kehalusan, warna kulit yang merata, dan wrinkled-free.'
],
[
'name' => 'SIDL',
'ingredients_text' => 'Cara merawat kulit untuk SIDL yaitu dengan menggunakan bahan yang membantu mengembalikan fungsi penghalang kulit, memberikan hidrasi, dan menghaluskan tanda-tanda penuaan. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan perawatan kulit yang dapat memperburuk kekeringan dan dehidrasi. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'SIDL harus menggunakan krim, pembersih, pelembab yang menyimpan lipid ke kulit untuk mengembalikan hidrasi. Pilih pelembap yang memiliki fungsi untuk mengembalikan skin barrier.

Gunakan lulur wajah dua atau tiga kali seminggu untuk mendapatkan tekstur kulit yang halus dan merata. Hindari pengelupasan kulit yang berlebihan karena dapat menyebabkan kerusakan lapisan kulitmu lebih lanjut.

Produk perawatan lainnya: retinoid, antioksidan, dan produk anti penuaan. Hindari pembersih berbusa, terutama yang mengandung deterjen anionik, yang dapat memperburuk kekeringan dan dehidrasi. Produk lain yang dapat menyebabkan kekeringan, seperti toner yang mengandung alkohol, juga harus dihindari ya!

Sunscreen every day it\'s a must! Remember that, my dear.',
'solution' => 'Wah, kamu memiliki kulit SIDL yaitu Kering, Tahan, Tak mudah terpigmentasi, dan Berkerut.

Mengapa SIDL tahan dan tak mudah terpigmentasi? Karena jika terjadi peradangan, kemerahan, bintik hitam, warna kulit tidak merata, terjadi inflamasi seperti jerawat dan rosacea bukan jadi masalah besar bagi #TeamSIDL

Sayangnya, dua masalah utama bagi kamu adalah dehidrasi dan penuaan (kerutan). Dehidrasi disebabkan oleh gangguan penghalang kulit, yang mengalami kesulitan menahan kelembapan dan menjaga agar iritasi tetap tertutup. Selain itu jika jarang pakai tabir surya dapat memicu munculnya tanda-tanda penuaan kulit, seperti garis-garis, kerutan, dan kendur.',
],
[
'name' => 'SIDC',
'ingredients_text' => 'Cara merawat kulit untuk SIDC yaitu dengan produk yang menawarkan hidrasi, mengembalikan fungsi skin barrier yang tepat, dan mengelupas penumpukan sel kulit mati di permukaan. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan perawatan kulit yang dapat memperburuk kekeringan dan dehidrasi. Ini termasuk berbagai jenis alkohol, terutama ketika tercantum dalam tujuh bahan pertama. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamSIDC gunakanlah pembersih yang lembut dan tidak berbusa atau minyak pembersih.

Selain itu pakai juga pelembab skin barrier dua kali sehari, idealnya pada kulit yang lembab. Scrub wajah dapat membantu memperbaiki tekstur kulit yang tidak rata dan meningkatkan kecerahan, tetapi jangan terlalu sering ya.

Pilih suncreen SPF pelembab yang tidak membuat kulit terasa kering dan hindari pembersih berbusa, yang menghilangkan minyak dari kulit. Toner yang mengandung alkohol dan produk lain yang dapat menyebabkan kekeringan juga harus dihindari ya.

Remember that, my dear!',
'solution' => 'Wah kamu punya kulit SIDC yaitu Kering, Tahan, Tak mudah terpigmentasi, dan Kencang.

Kulit SIDC umumnya mudah dirawat karena tidak mengalami peradangan, tak mudah terpigmentasi, atau terjadi penuaan dini. Perawatan kulit sederhana yang bisa dilakukan yaitu gunakan pelembab skin barrier, pembersih yang menghidrasi, dan tabir surya sehari-hari untuk menjaga kulit sehat dan bersih.

Keluhan utama kebanyakan dari kulitmu adalah kulit kusam, warna kulit tidak rata, dan terkadang gatal, jangan khawatir karena gejala-gejala ini biasanya mudah diobati. Hal ini dapat menyebabkan penumpukan sel-sel kulit mati dan kotoran di permukaan kulit.',
],
[
'name' => 'GFML',
'ingredients_text' => 'Material terbaik untuk tipe kulit kamu, sebaiknya yang mampu menenangkan inflamasi, mencerahkan bintik-bintik hitam, garis halus dan kerutan, dan mencegah kerusakan akibat sinar matahari. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari pemakaian bahan yang menyebabkan inflamasi serta pori-pori kulitmu jadi tersumbat atau iritasi.  Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'Tipe kulit GFML disarankan untuk memakai produk cleanser yang berbusa atau bahan-bahan yang mengandung salicylic acid untuk mengontrol minyak berlebih dan jerawat. Kombinasikan juga dengan skin-brightening untuk mengatasi pigmentasi. Tangani kulitmu yang iritasi dan kemerahan dengan memakai produk anti-inflamasi.

Karena kamu memiliki kulit berminyak, #TeamGFML biasanya bisa melewatkan penggunaan pelembab di pagi hari. Tapi, biasakan kamu pakai sunscreen setiap hari, yaa! Supaya kamu tetap terjaga dari kerusakan akibat sinar matahari, dengan memakai sunscreen SPF 15 atau lebih tinggi, baik ketika berada di dalam maupun di luar ruangan.

Jauhi berbagai produk berbahan komedogenik yang dapat menyumbat pori-porimu. Pelembab yang berat juga sebaiknya tidak kamu pakai, karena kulit kamu sudah menghasilkan cukup sebum untuk mempertahankan skin barrier yang sehat.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit GFML yang Berminyak, Sensitif, Mudah Terpigmentasi, dan Berkerut.

Keuntungannya kamu memiliki tipe kulit ini, tidak perlu khawatir akan dehidrasi. Sebum (minyak) yang dihasilkan oleh kulitmu, cukup untuk menjaga skin barrier yang sehat dan mampu mempertahankan kelembaban sekaligus mencegah iritasi.

Kemerahan, inflamasi, warna kulit yang tidak merata, berkerut/keriput, dan kondisi seperti jerawat, rosacea, melasma atau perubahan pigmen pasca-inflamasi menjadi masalah yang biasanya dihadapi oleh tipe kulit GFML.

Selain masalah dengan inflamasi, pigmentas, kulit kamu juga rentan terhadap tanda-tanda penuaan, apalagi jika kamu terlalu sering terkena paparan sinar matahari, kamu bisa mengalami penuaan dini (photoaging) khususnya usia yang lebih muda. ',
],
[
'name' => 'GFMC',
'ingredients_text' => 'Material terbaik untuk tipe kulit kamu, sebaiknya yang mampu mengontrol jerawat dan produksi minyak berlebih tanpa mengiritasi kulit sensitifmu. Gunakan juga bahan yang memiliki kualitas mencerahkan kulit untuk mengobati bintik hitam yang disebabkan perubahan pigmen setelah inflamasi. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari pemakaian bahan yang menyebabkan inflamasi serta pori-pori kulitmu jadi tersumbat atau iritasi.  Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'Produk yang cocok buat #TeamGFMC yaitu foaming cleanser! Cleanser ini bisa membantu kamu dalam mengontrol minyak berlebih. Cleanser yang mengandung salicylic acid juga bagus untuk mengatasi jerawat kamu.

Produk-produk pencerah kulit, bahan anti-inflamasi, antioksidan, retinoid, dan bakuchiol, cocok untuk tipe kulitmu.

Biasakan juga pakai sunscreen non-comedogenic yang tidak menyumbat pori-pori kamu dan pakai setiap hari! Minimal SPF 15 atau lebih (jika kamu terbiasa di dalam ruangan) atau SPF 30 atau yang lebih tinggi (jika kamu berada di luar ruangan selama 1 jam lebih).

Jauhi berbagai produk yang bisa menyebabkan pori-pori kulitmu tersumbat dan berjerawat seperti minyak kelapa, bahan emolien.

Tips dari SML, sebaiknya lakukan tahapan mencuci muka di bagian akhir ketika kamu mandi. Tujuannya agar bahan-bahan sampo, sabun mandi, dan lainnya bisa dicuci dan disingkirkan sehingga tidak menyumbat pori-pori kulitmu.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit GFMC yaitu Berminyak, Sensitif, Mudah Terpigmentasi dan Kencang.

Kamu memiliki 2 dari 4 hambatan menuju kulit sehat, yaitu inflamasi dan pigmentasi. Biasanya tipe kulitmu juga berjuang menghadapi jerawat dan hiperpigmentasi pasca-inflamasi. Kombinasi antara jerawat dan pigmentasi menjadi tantangan tersendiri bagi kulitmu.

Alasan kamu sering mengalami inflamasi seperti rasa terbakar, kemerahan, dan perih karena tipe kulitmu yang sensitif. Sedangkan, kadar minyak berlebihan yang kamu rasakan menjadi akar penyebab munculnya jerawat.

Ketika jerawat memicu respons peradangan di kulitmu, kemungkinan akan meninggalkan bintik-bintik gelap (dark spot) di mana lesi (luka) jerawat itu berada. Ini dikenal sebagai hiperpigmentasi pasca-inflamasi.

Mungkin kamu cukup frustasi dengan lesi jerawat lalu diikuti bekas jerawat dan itu terus berulang menjadi sebuah siklus bagi tipe kulit sepertimu. Namun, kalau kamu mengambil langkah-langkah untuk mencegah timbulnya jerawat sejak awal, kamu dapat menghentikan siklus ini dan mencapai kulit yang bersih dan bebas jerawat, dear.

Hindari berjemur di dalam dan di luar ruangan, makan makanan yang sehat, dan kelola stres bisa kamu praktekkan mulai dari hari ini.',
],
[
'name' => 'GIML',
'ingredients_text' => 'Cara merawat kulit untuk GIML yaitu gunakan produk dengan kualitas pencerah kulit untuk mengatasi warna kulit yang tidak merata, serta kualitas antioksidan dan anti-penuaan untuk menghaluskan tampilan garis dan kerutan serta membantu mencegah tanda-tanda penuaan dini di masa mendatang. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan-bahan yang menyumbat pori-pori, menyebabkan komedo, komedo putih, dan jerawat. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamGIML sebaiknya menggunakan pembersih berbusa untuk membantu mengontrol minyak berlebih pada kulit. Pembersih asam salisilat juga dapat digunakan untuk menjaga pori-pori tetap bersih. Berbagai produk perawatan dapat digunakan, tergantung pada kebutuhan spesifik kulitmu seperti mencakup antioksidan, produk pencerah kulit, dan produk anti penuaan.

Penggunaan produk retinoid cocok untuk kerutan, pigmentasi, serta membantu mengontrol produksi sebum. Gunakan pelembab asam hialuronat untuk meningkatkan penetrasi produk perawatan kulitmu, selain itu bersihkan wajah dengan air hangat juga dapat membantu meningkatkan penetrasi.

Gunakan tabir surya tiap hari, nah pilihlah tabir surya non-komedogenik. Hindari produk perawatan kulit yang dapat menyebabkan pori-pori tersumbat atau memperburuk masalah pigmentasi. Pelembab dengan lemak jenuh seperti asam palmitat harus dihindari karena dapat mengaktifkan tirosinase, enzim yang bertanggung jawab untuk produksi melanin. Kamu boleh tidak menggunakan pelembab di pagi hari untuk menghindari wajah yang terlalu berminyak.

Remember that, my dear!',
'solution' => 'Wah kamu punya kulit GIML yaitu Berminyak, Tahan, Mudah Terpigmentasi, dan Kerutan.

Cara GIML menghadapi warna kulit yang tidak merata dan tanda-tanda penuaan seperti garis, kerutan, dan kulit kendur yaitu dengan perawatan kulit yang tepat.

Jangan khawatir jika terjadi kondisi kulit kering, mengelupas, gatal, kemerahan, sensitif, atau peradangan seperti rosacea atau eksim. Kulitmu menghasilkan cukup sebum (minyak) untuk menjaga pelindung kulit tetap sehat dan berfungsi dengan baik.

Masalah mudah terpigmentasi yang dirasakan oleh GIML seperti melasma, flek hitam, dan warna kulit tidak merata, serta tanda-tanda penuaan dini karena kamu salah satu dari tiga kategori ini:

1. Orang yang lebih muda dengan paparan sinar matahari yang signifikan, yang biasanya tidak menyukai tabir surya karena kulit yang berminyak.
2. Seorang wanita dengan melasma yang mungkin disebabkan oleh kehamilan atau penggunaan hormon.
3. Seseorang di atas usia 30 yang tidak menggunakan banyak tabir surya di masa lalu.',
],
[
'name' => 'GIMC',
'ingredients_text' => 'Perawatan yang dilakukan oleh GIMC yaitu bertujuan untuk menjaga kulit tetap yang sehat, bebas kerut dan merawat warna kulit yang tidak merata atau adanya bintik-bintik gelap. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari pemakaian bahan yang dapat menyebabkan fotodermatitis atau memperburuk kondisi seperti melasma yang menyebabkan warna kulit tidak merata. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'Paparan sinar matahari adalah penyebab utama bintik hitam dan warna kulit tidak merata. Selain itu, jenis kulit berminyak seperti GIMC harus menggunakan pembersih berbusa untuk membantu mengontrol jumlah minyak pada kulit. Pembersih asam salisilat dapat membantu menjaga pori-pori tetap bersih dan bebas dari bakteri penyebab jerawat.

Bahan pencerah kulit seperti vitamin C, asam kojic, atau hidrokuinon harus dipertimbangkan untuk mengatasi masalah pigmentasi.

#TeamGIMC harus menghindari produk perawatan kulit yang mengandung minyak esensial tertentu yang menyebabkan fotosensitifitas. Jika kamu GIMC kulit yang sangat berminyak, tidak masalah jika melewatkan penggunaan pelembab di pagi hari, tapi jangan lupa selalu pakai suncreen SPF sebagai gantinya.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit GIMC, Greasy (berminyak), Immune (resisten), Mark (mudah terpigmentasi), dan Chewy (Kencang).

Dengan hanya satu penghalang untuk kesehatan kulit yaitu mudah terpigmentasi, jenis kulit GIMC sangat dekat dengan memiliki kulit ideal. Kekeringan, peradangan, dan penuaan dini bukanlah masalah untuk kulitmu.

Warna kulit yang tidak merata dapat disebabkan oleh paparan sinar matahari, fluktuasi hormon seperti selama atau setelah kehamilan, dan ketika kulit bersentuhan dengan zat tertentu seperti jeruk nipis atau jus seledri dan secara bersamaan terkena sinar matahari.',
],
[
'name' => 'GFDL',
'ingredients_text' => 'Cara merawat kulit untuk GFDL yaitu gunakan bahan yang mampu menenangkan peradangan, mengobati dan mencegah jerawat, dan membantu menghaluskan garis dan kerutan sekaligus menjaga kulit tetap terlindungi dari kerusakan akibat sinar matahari. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari pemakaian bahan yang dapat memicu peradangan dan menyumbat pori-pori. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'Seperti jenis kulit berminyak lainnya, #TeamGFDL cocok dengan foaming cleanser dan/atau mengandung salicylic acid untuk membantu mengontrol minyak dan jerawat.

Retinoid, retinol, dan bakuchiol direkomendasikan untuk jenis kulit GFDL, karena bahan-bahan ini dapat mengobati jerawat dan tanda-tanda penuaan. Tentunya bahan-bahan tersebut diaplikasikan secara perlahan dan bertahap untuk menghindari iritasi dan kekeringan.

Gunakan juga bahan-bahan bersifat anti-inflamasi, antioksidan, atau bahan anti-penuaan lainnya.

Kamu juga wajib memakai sunscreen non-comedogenic (tidak menyumbat pori-pori) setiap hari supaya kulitmu tetap terlindungi.

Hindari produk yang mengandung bahan penyumbat pori atau yang dapat menyebabkan iritasi, kemerahan, dan tanda-tanda peradangan lainnya. Jika kamu GFDL dengan kulit sangat berminyak boleh skip penggunaan pelembab pagi hari, dan hanya gunakan pelembab ringan di malam hari.

Remember that, my dear!',
'solution' => 'Wah, kulitmu memiliki tipe kulit GFDL, Greasy (berminyak), Fire (sensitif), Delicate (tidak mudah terpigmentasi), dan Line (berkerut).

Keuntungan kamu memiliki tipe kulit GFDL, kamu tidak perlu khawatir akan dehidrasi dan pigmentasi. Sebum (minyak) yang dihasilkan oleh kulitmu, cukup untuk menjaga skin barrier yang sehat dan mampu mempertahankan kelembaban sekaligus mencegah iritasi. Selain itu, kamu juga jarang mengalami pigmentasi seperti dark spots, dan warna kulit yang tidak merata.

Ada dua masalah utama yang dihadapi oleh tipe kulit GFDL, salah satunya kulitmu rentan akan inflamasi, karena kamu punya kulit yang sensitif. Jika kondisi minyakmu berlebihan, pori-pori kulitmu akan tersumbat ditambah dengan inflamasi yang dapat menyebabkan munculnya jerawat atau rosacea.

Tanda-tanda penuaan seperti kerutan dan kulit kendur juga menjadi perhatian utama tipe kulit GFDL. Hal ini juga bisa dipercepat jika kamu sering terkena paparan sinar matahari secara langsung.

Tapi tenang aja, gunakan perawatan kulit yang tepat maka kamu bisa meraih kulit yang halus, bersih, dan sehat!

',
],
[
'name' => 'GFDC',
'ingredients_text' => 'Material terbaik untuk tipe kulit kamu, sebaiknya yang mampu mengendalikan inflamasi dan penyebab jerawat, yaa. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari pemakaian bahan yang menyebabkan inflamasi serta pori-pori kulitmu jadi tersumbat atau iritasi. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamGFDC penting menggunakan produk cleanser yang berbusa dan/atau mengandung bahan salicylic acid untuk mengontrol minyak berlebih dan jerawat. Tangani kulitmu yang iritasi dan kemerahan dengan memakai produk anti-inflamasi.

Kebanyakan jenis kulit sepertimu tidak perlu memakai pelembab 2x sehari. Sehingga tidak apa-apa jika melewatkan pelembab di pagi hari dan tukar dengan sunscreen non-komedogenik yang tidak menyumbat pori-pori. Di malam hari, kamu bisa pakai pelembab ringan yang tidak mengandung bahan komdeogenik.

Jauhi berbagai produk berbahan komedogenik yang dapat menyumbat pori-porimu.

Remember that, my dear!',
'solution' => 'Wah, kamu memiliki tipe kulit GFDC yaitu Berminyak, Sensitif, Tidak Mudah Terpigmentasi dan Kencang.

Kulitmu yang sensitif, rawan mengalami inflamasi yang menjadi hambatanmu menuju kulit idaman. Tapi tenang aja, kamu bisa pilih bahan yang mengobati jerawat secara tepat dengan mengkombinasikan bahan anti-inflamasi, maka kamu bisa meraih kulit yang halus, bersih, dan sehat!

Kulit kamu menghasilkan sebum (minyak) yang cukup sehingga memiliki skin barrier yang sehat dan dapat mengunci kelembapan untuk mencegah iritasi.

Tipe kulitmu juga tidak memiliki masalah pigmentasi seperti bintik hitam (dark spot), warna kulit yang tidak merata, atau kondisi seperti melasma atau hiperpigmentasi pasca-inflamasi. Karena, kamu memiliki usia yang lebih muda atau kamu punya kebiasaan memakai sunscreen yang baik, sehingga cenderung kulitmu mulus dan bebas kerut.

Inflamasi bisa terjadi disebabkan karena adanya bakteri C. acnes yang memicu tumbuhnya jerawat atau fluktuasi hormon. Kendalikan inflamasi dengan menggunakan bahan-bahan yang dapat membunuh bakteri C. acnes ya!',
],
[
'name' => 'GIDL',
'ingredients_text' => 'Cara merawat kulit untuk GIDL yaitu gunakan produk yang memberikan manfaat anti-penuaan dan antioksidan untuk membantu memperbaiki tanda-tanda penuaan, serta mencegah kerusakan kulit di masa depan yang disebabkan oleh stres oksidatif. Pakailah jenis ingredients seperti tabel di atas ya!

Hindari bahan perawatan kulit komedogenik yang dapat menyumbat pori-pori dan menyebabkan komedo, whiteheads, dan jerawat. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => 'Bagi #TeamGIDL harus menggunakan pembersih berbusa dan asam salisilat untuk membantu mengontrol jumlah sebum (minyak) pada kulit dan menjaga pori-pori tetap bersih. Karena skin barrier berfungsi dengan baik, beberapa produk perawatan mungkin mengalami kesulitan menembus kulitmu secara efektif. Untuk membantu penetrasi gunakan pelembab ringan dengan asam hialuronat dan heparan sulfat.

Kulit GIDL dapat mentolerir antioksidan, retinoid, dan produk anti-penuaan lainnya dengan baik. Gunakan juga tabir surya tiap hari untuk membantu mengurangi kerutan ya!

Seperti jenis kulit berminyak lainnya, GIDL tidak boleh menggunakan pembersih krim atau pelembab, karena ini dapat menyimpan lebih banyak minyak ke kulit.

Banyak jenis kulit berminyak tidak perlu menggunakan pelembab pagi hari dan sebagai gantinya gunakan tabir surya non-komedogenik.

Remember that, my dear!',
'solution' => 'Wah kamu punya kulit GIDL yaitu Berminyak, Tahan, Tak mudah terpigmentasi, dan Berkerut.

Jenis kulit ini sangat ideal untuk orang berusia di atas 30 tahun, tanda-tanda penuaan secara alami menjadi lebih jelas di sekitar usia ini karena akumulasi paparan sinar matahari dan proses penuaan alami.

Satu-satunya penghalang bagi kesehatan kulitmu adalah penuaan, yang biasanya dapat dengan mudah dikelola dengan penggunaan bahan anti-penuaan dan antioksidan yang tepat, serta tabir surya harian. Meskipun tidak ada cara alami dalam menghentikan proses penuaan, perawatan kulit terbaik adalah dengan pilihan gaya hidup sehat karena akan membantu memperlambat proses dan bahkan dapat mencegah tanda-tanda penuaan lanjut seperti bintik matahari hingga kulit kendur yang parah.',
],
[
'name' => 'GIDC',
'ingredients_text' => 'Cara merawat kulit untuk GIDC yaitu dengan menggunakan bahan perawatan kulit yang membantu mengontrol minyak berlebih pada kulit, menjaga kulit bebas dari pori-pori tersumbat dan jerawat. Pakailah jenis ingredients seperti tabel di atas ya!

Pori-pori yang tersumbat biasanya merupakan satu-satunya tantangan untuk beberapa GIDC, jadi hindari bahan-bahan yang dapat menyebabkan pori-pori tersumbat atau minyak berlebih pada kulit. Jauhi material seperti pada tabel di atas ya!',
'products_guideline' => '#TeamGIDC sebaiknya menggunakan pembersih berbusa untuk membantu mengontrol minyak berlebih pada kulit. Pembersih asam salisilat dapat membantu menjaga pori-pori tetap bersih dan mencegah komedo, komedo putih, dan jerawat.

Sebagian besar tidak perlu banyak produk perawatan untuk jenis kulitmu.

Sunscreen every day it\'s a must! Remember that, my dear.',
'solution' => 'Wah kamu punya kulit GIDC yaitu Greasy (Berminyak), Immune (Tahan), Delicate (Tidak Mudah Terpigmentasi), dan Chewy (Kencang), tanpa hambatan kesehatan kulit.

#TeamGIDC adalah mereka yang memiliki kulit "normal". Kulitmu mudah diatur, dan rangkaian perawatan kulit ditujukan untuk menjaga kulit agar tetap seperti semula. Jenis kulit yang ideal ini tidak memiliki hambatan untuk kesehatan kulit.

Namun, tetap penting untuk merawat kulitmu dengan baik, hindari paparan sinar matahari yang berlebihan untuk menjaga kulit yang halus, sehat, dan tampak awet muda.',
],
        ];

        foreach ($types as $type) {
            SkinType::firstOrCreate(
                ['name' => $type['name']],
                [
                    'solution' => $type['solution'],
                    'ingredients_text' => $type['ingredients_text'],
                    'products_guideline' => $type['products_guideline'],
                ]
            );
        }
    }
}
