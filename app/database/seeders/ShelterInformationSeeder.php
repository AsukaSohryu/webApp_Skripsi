<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelterInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shelter_information')->insert([
            [
                'shelter_name' => 'Shelter Us',
                'shelter_logo' => '',
                'address' => 'Jl. Lorem Ipsum Blok A No 20, Jakarta, Jakarta Selatan',
                'email' => 'shelterus@gmail.com',
                'operational_hour' => ' <p>Senin 09.00 - 17.00<br>Selasa 09.00 - 17.00<br>Rabu 09.00 - 17.00<br>Kamis 09.00 - 17.00<br>Jumat 09.00 - 17.00<br></p>',
                'whatsapp_number' => '087889360769',
                'phone_number' => '087889360769',
                'instagram' => 'www.instagram/ShelterUs.com',
                'facebook' => 'www.facebook/ShelterUs.com',
                'twitter' => 'www.twitter/ShelterUs.com',
                'youtube' => 'www.youtube/ShelterUs.com',
                'donation_information' => 'Donasi dapat disalurkan kepada rekening 5271875046 A/N Shelter Us',
                'shelter_photo' => '',
                'about_shelter' => 'Selamat datang di Shelter Us, tempat di mana setiap hewan berhak mendapatkan kesempatan kedua untuk hidup yang lebih baik. Kami adalah sebuah organisasi yang berdedikasi untuk menyelamatkan, merawat, dan menemukan rumah permanen bagi hewan peliharaan liar dan terlantar. Di Shelter Us, kami menerima laporan penyelamatan hewan yang membutuhkan bantuan, serta penyerahan hewan dari individu yang tidak dapat lagi merawat mereka. Kami percaya bahwa setiap hewan, tanpa memandang latar belakang atau kondisi, layak mendapatkan cinta dan perhatian. Selain itu, kami juga menyediakan program adopsi yang bertujuan untuk menghubungkan hewan-hewan kami dengan keluarga yang peduli dan siap memberikan kasih sayang. Dengan dukungan komunitas dan relawan, kami berkomitmen untuk meningkatkan kesejahteraan hewan dan menciptakan kesadaran tentang pentingnya perlindungan hewan. Bergabunglah dengan kami dalam misi ini dan bantu kami memberikan suara bagi mereka yang tidak dapat berbicara.',
                'vision' => 'Menjadi tempat penampungan hewan terkemuka yang berkontribusi pada kesejahteraan hewan di komunitas, di mana setiap hewan terlantar dan liar mendapatkan kesempatan untuk hidup yang lebih baik dan menemukan rumah yang penuh kasih.',
                'mission' => '
                    <p>Misi Shelter Us:</p><ol><li>Penyelamatan dan Perawatan: Menyelamatkan hewan-hewan terlantar, terluka, atau terabaikan, serta memberikan perawatan medis dan tempat tinggal yang aman hingga mereka siap untuk diadopsi.</li><li>Program Adopsi: Menghubungkan hewan-hewan kami dengan keluarga yang peduli melalui program adopsi yang bertanggung jawab, memastikan bahwa setiap hewan menemukan rumah yang sesuai dengan kebutuhan mereka.</li><li>Edukasi dan Kesadaran: Meningkatkan kesadaran masyarakat tentang pentingnya perlindungan hewan, adopsi, dan tanggung jawab pemeliharaan hewan peliharaan melalui program edukasi dan kampanye.</li><li> Kolaborasi Komunitas: Bekerja sama dengan individu, organisasi, dan relawan untuk menciptakan jaringan dukungan yang kuat bagi kesejahteraan hewan dan mendorong partisipasi aktif dalam kegiatan perlindungan hewan.</li><li>Advokasi Kesejahteraan Hewan: Mendorong kebijakan dan praktik yang mendukung perlindungan dan kesejahteraan hewan di tingkat lokal dan nasional, serta berperan sebagai suara bagi hewan yang tidak memiliki suara.&nbsp;<br><br></li></ol>
                ',
                'founder_name' => 'Dr. Alexandra Lexiana',
                'founder_photo' => '',
                'founder_description' => 'Dr. Alexandra Lexiana adalah seorang dokter hewan yang berdedikasi dan pendiri sebuah tempat penampungan hewan yang terkemuka. Dengan semangat untuk kesejahteraan hewan, ia telah mengabdikan karirnya untuk memberikan perawatan yang penuh kasih dan memperjuangkan kebutuhan hewan yang terlantar dan ditinggalkan. Di bawah kepemimpinannya, tempat penampungan ini telah menjadi tempat yang aman bagi banyak hewan peliharaan, memberikan mereka kesempatan kedua untuk hidup.',
                'history' => 'Shelter Us didirikan oleh Dr. Alexandra, seorang dokter hewan yang memiliki kecintaan mendalam terhadap hewan dan komitmen untuk meningkatkan kesejahteraan mereka. Dengan visi untuk memberikan perlindungan dan perawatan bagi hewan-hewan terlantar dan terabaikan, Dr. Alexandria memulai perjalanan ini dengan tekad yang kuat. Sejak dibuka, Shelter Us telah menjadi rumah bagi lebih dari 100 anjing dan 50 kucing, yang semuanya telah menerima perawatan medis dan kasih sayang yang mereka butuhkan. Melalui program adopsi yang bertanggung jawab dan inisiatif edukasi untuk masyarakat, Dr. Alexandria dan timnya berusaha untuk menciptakan lingkungan yang lebih baik bagi hewan-hewan ini, serta meningkatkan kesadaran akan pentingnya perlindungan hewan. Dengan dedikasi dan kerja keras, Shelter Us terus berupaya untuk memberikan harapan dan kesempatan baru bagi setiap hewan yang membutuhkan.',
                'additional_information' => 'Shelter Saat ini memerlukan bantuan berupa makanan, air, dan uang untuk biaya pengobatan beberapa anjing yang terluka parah saat ditemukan, besar harapan kami agar ',
                'is_accepting_report' => 1,
                'is_accepting_handover' => 1,
                'is_accepting_adoption' => 1,
                'report_information' => '
                    <p>Panduan Melaporkan Penemuan Hewan Liar:</p>
                    <ol>
                        <li>Pastikan keadaan hewan yang ditemukan (Apakah dalam keadaan terluka dan memerlukan bantuan?).</li>
                        <li>Jika hewan yang Anda temukan dalam kondisi sehat, tidak terluka maupun memerlukan bantuan, maka abaikan hewan tersebut, terutama kucing (Pada umumnya kucing jalanan yang berada dalam kondisi sehat menandakan bahwa ada yang merawat).</li>
                        <li>Jika hewan yang Anda temukan dalam kondisi terluka/memerlukan bantuan, berikut hal yang harus Anda persiapkan sebelum membuat laporan:</li>
                        <ol>
                            <li>Ambil foto anjing/kucing liar yang Anda temukan.</li>
                            <li>Buka Google Maps, klik lokasi di sekitar Anda menemukan yang dapat dijadikan patokan/acuan.</li>
                            <li>Foto lokasi penemuan beserta anjing/kucing liar yang Anda temukan.</li>
                            <li>Foto bebas yang memungkinkan menjadi bantuan dalam mencari hewan liar tersebut.</li>
                        </ol>
                    </ol>
                    <p><strong>Pemilik akun bertanggung jawab atas laporan yang dibuat.</strong></p>
                ',
                'handover_information' => '
                    <p>Ketentuan Menyerahkan Hewan:</p>
                    <ol>
                        <li>Sebelum menyerahkan hewan milik pribadi, pertimbangkan juga alternatif lain sebelum menyerahkan hewan ke shelter, seperti mencari pemilik baru yang dapat merawat hewan tersebut.</li>
                        <li>Sebelum menyerahkan hewan peliharaan liar (anjing/kucing) yang ditemukan di jalan:</li>
                        <ol>
                            <li>Bawa hewan ke dokter hewan untuk pemeriksaan kesehatan menyeluruh.</li>
                            <li>Pastikan hewan tersebut sudah mendapatkan vaksinasi yang diperlukan.</li>
                            <li>Berikan pengobatan terhadap parasit seperti cacing, kutu, dan tungau.</li>
                        </ol>
                    </ol>

                    <p>Ketentuan Menyerahkan Hewan Milik Pribadi:</p>
                    <ol>
                        <li>Sediakan informasi rinci mengenai hewan tersebut, seperti usia, jenis kelamin, perilaku, kebiasaan makan, dan sejarah kesehatan.</li>
                        <li>Jika hewan tersebut memiliki riwayat medis atau obat-obatan yang perlu diberikan, informasikan secara jelas kepada shelter.</li>
                    </ol>

                    <p>Perlengkapan Hewan:</p>
                    <ol>
                        <li>Bawa barang-barang pribadi hewan seperti tempat tidur, mainan, atau makanan favoritnya. Ini akan membantu hewan merasa lebih nyaman di lingkungan baru.</li>
                    </ol>

                    <p><strong>Harap mengontak Admin via WhatsApp terlebih dahulu jika ada yang ingin ditanyakan sebelum mengisi formulir.</strong></p>
                ',
                'adoption_information' => '
                    <p>Sebelum mengadopsi hewan dari shelter, ada beberapa hal penting yang perlu diperhatikan:</p>
                    <ol>
                        <li>Pastikan Anda siap untuk komitmen jangka panjang dalam merawat hewan peliharaan, yang bisa berlangsung bertahun-tahun.</li>
                        <li>Evaluasi gaya hidup Anda, termasuk rutinitas harian dan situasi tempat tinggal, untuk memastikan bahwa Anda dapat memberikan waktu dan lingkungan yang diperlukan untuk hewan peliharaan.</li>
                        <li>Tentukan jenis hewan yang paling sesuai dengan gaya hidup Anda, seperti anjing atau kucing, serta pertimbangkan kebutuhan spesifik dari spesies atau ras tersebut.</li>
                        <li>Jika Anda sudah memiliki hewan peliharaan lain, pikirkan tentang bagaimana hewan baru akan beradaptasi dengan dinamika keluarga yang ada. Lakukan pengenalan dengan cara yang terkendali.</li>
                        <li>Tanyakan tentang riwayat perilaku hewan tersebut dan masalah yang mungkin ada, karena pemahaman tentang temperamen mereka akan membantu Anda dalam pelatihan dan integrasi.</li>
                        <li>Periksa catatan kesehatan hewan, termasuk vaksinasi, status sterilisasi, dan masalah kesehatan yang diketahui, untuk mengantisipasi biaya veteriner di masa depan.</li>
                        <li>Siapkan rumah Anda dengan menghilangkan bahaya dan menyediakan perlengkapan yang diperlukan, seperti makanan, mangkuk air, tempat tidur, dan mainan.</li>
                        <li>Pertimbangkan tanggung jawab finansial, termasuk biaya makanan, perawatan veteriner, grooming, dan perlengkapan.</li>
                        <li>Kenali sumber daya lokal, seperti pelatih, dokter hewan, dan kelompok dukungan hewan peliharaan, untuk membantu Anda menjalani kepemilikan hewan peliharaan dengan sukses.</li>
                    </ol>
                    <p><strong>Harap mengontak Admin via WhatsApp terlebih dahulu jika ada yang ingin ditanyakan sebelum mengisi formulir.</strong></p>
                ',
            ],
        ]);
    }
}
