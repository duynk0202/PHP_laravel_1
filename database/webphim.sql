-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 12:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphim`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaKH` int(11) NOT NULL,
  `Noidung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaSP` char(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `MaCTHD` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaSP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaymua` date NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaCTHD` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_02_075746_create_theloai_table', 1),
(6, '2022_03_02_095347_create_sanphams_table', 1),
(7, '2022_03_02_095551_create_cthd_table', 1),
(8, '2022_03_02_095808_create_binhluan_table', 1),
(9, '2022_03_02_095849_create_hoadon_table', 1),
(10, '2022_03_03_090147_create_flights_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanphams`
--

CREATE TABLE `sanphams` (
  `MaSP` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenSP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mota` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `MaLoai` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`MaSP`, `TenSP`, `Mota`, `gia`, `MaLoai`, `image`, `created_at`, `updated_at`) VALUES
('PC02', 'Venom', 'Quái Vật Venom là một kẻ thù nguy hiểm và nặng ký của Người nhện trong loạt series của Marvel. Chàng phóng viên Eddie Brock (do Tom Hardy thủ vai) bí mật theo dõi âm mưu xấu xa của một tổ chức và đã không may mắn khi nhiễm phải loại cộng sinh trùng ngoài hành tinh (Symbiote) và từ đó đã không còn làm chủ bản thân về thể chất lẫn tinh thần. Điều này đã dần biến anh thành quái vật đen tối và nguy hiểm nhất chống lại người Nhện - Venom.', 100004, 'MA', 'Public/Images\\p8.png', NULL, '2022-03-15 01:32:07'),
('PC03', 'Tia chớp đen', 'Một siêu anh hùng đã về hưu trở thành người bảo vệ công lý. Black Lightning là siêu anh hùng có khả năng có khả năng tạo ra và phóng các tia điện, mặc dù không ai biết được những tia điện này mạnh cỡ nào nhưng nó đủ để làm choáng và thậm chí giết người.', 30000, 'FIHD', 'Public/Images\\p117.png', NULL, NULL),
('PC05', 'Siêu nhân mù', 'Daredevil mùa 3 tiếp tục theo chân chàng luật sư khiếm thị Matt Murdock (Charlie Cox), ban ngày anh đấu tranh cho người nghèo ở khu Hell’s Kitchen, nhưng khi màn đêm buông xuống thì anh là Daredevil – siêu anh hùng đường phố dùng vũ lực để đưa kẻ xấu ra ánh sáng và thực hiện những nhiệm vụ mà các siêu anh hùng như Iron Man (Robert Downey Jr.) và Captain America (Chris Evans) không có thời gian để quan tâm đến.', 100000, 'FIHD', 'Public/Images\\p17.png', NULL, NULL),
('PC06', 'Hoàng tử hào hoa', 'Charming - Hoàng Tử Hào Hoa mang đến cho khán giả một câu chuyện mới, một góc nhìn cực kỳ thú vị, sáng tạo và chưa bao giờ được kể của ba cô gái xinh đẹp trong xứ sở thần tiên nổi tiếng: Bạch Tuyết, Lọ Lem và Công Chúa Ngủ Trong Rừng. Một ngày nọ cả ba khám phá ra rằng những vị hôn phu mà các cô đính hôn thật ra đều là cùng một người đó là Hoàng Tử Charming. Bên cạnh đó còn có hàng triệu cô gái trong vương quốc thầm thương trộm nhớ muốn trở thành vợ của Hoàng Tử.', 200000, 'FITC', 'Public/Images\\p36.png', NULL, NULL),
('PC07', 'Một và Hài', 'Zac và Eva sống cùng bố mẹ trong trang trại bí ẩn, được bao quanh bởi một bức tường đồ sộ. Gia đình họ sống và làm việc theo lối những năm 1800 xưa cũ. Khi mẹ của hai anh em bị bệnh nặng, họ khám phá ra những bí mật đen tối ẩn khuất của gia đình và sức mạnh siêu nhiên dịch chuyển tức thời của họ. Tất cả chúng đe dọa sự bình yên của gia đình. “One and Two” là câu chuyện về mối quan hệ khắn khít và yêu thương giữa hai anh em nói riêng và giữa các thành viên trong gia đình nói chung.', 30000, 'FITC', 'Public/Images\\p115.png', NULL, NULL),
('PC08', 'Đảo hải tặc', 'Phim Đảo Hải Tặc - One Piece là chuyện về cậu bé Monkey D. Luffy do ăn nhầm Trái Ác Quỷ, bị biến thành người cao su và sẽ không bao giờ biết bơi. 10 năm sau sự việc đó, cậu rời quê mình và kiếm đủ 10 thành viên để thành một băng hải tặc, biệt hiệu Hải tặc Mũ Rơm.', 500000, 'FIHD', 'Public/Images\\p90.png', NULL, NULL),
('PC09', 'EUREKA SEVEN AO', 'Là sequel của anime nổi tiếng Eureka Seven chiếu năm 2005. Câu chuyện lần này lấy bổi cảnh là đảo Iwado của Okinawa, trong thời gian gần đây bỗng nổi lên 1 phong trào đòi quyền tự trị. Nhân vật chính Ao Fukai sống cùng 1 ông bác sĩ già tên Toshio, cha cậu không rõ đã đi đâu còn mẹ cậu đã bị bắt cóc bởi 1 nhóm người lạ mặt 10 năm về trước. Cậu chơi thân với Naru Arata, 1 cô bạn chứa trong mình 1 sức mạnh có tên “yuta”. Một ngày, 1 thực thể bí ẩn tên “Secret” bỗng dưng xuất hiện và tấn công đảo, bắt buộc Ao phải lái Nirvash để phản công..', 30000, 'FIHD', 'Public/Images\\p34.png', NULL, NULL),
('PC10', 'Đặc vụ bất chấp', 'Hào hoa và lịch lãm chẳng kém gì James Bond, Mr.Chan là một điệp viên đẳng cấp hàng đầu. Anh chàng được một nữ cảnh sát ngỏ lời giúp đỡ cô trong một vụ án đầy gian nan. Trong suốt hành trình truy tìm ra câu trả lời, cả hai đã gặp phải vô số những pha đụng độ nguy hiểm nhưng cũng không kém phần hài hước.', 20000, 'FIHD', 'Public/Images\\p94.png', NULL, NULL),
('PC11', 'MOBILE SUIT GUNDAM NT', 'U.C. 0097, một năm sau khi mở Hộp Laplace. Bất chấp sự mặc khải của Hiến chương Thế kỷ thừa nhận sự tồn tại và quyền của Newtypes, khuôn khổ của thế giới đã không bị thay đổi nhiều. Cuộc xung đột sau này được gọi là Sự cố Laplace được cho là đã kết thúc với sự sụp đổ của những tàn tích Neo Zeon được gọi là Áo. Trong trận chiến cuối cùng của nó, hai bộ đồ di động khung hình đầy đủ tâm lý thể hiện sức mạnh vượt ra khỏi sự hiểu biết của con người. Con lân trắng và con sư tử đen bị phong ấn để loại bỏ nguy hiểm này khỏi tâm thức của mọi người, và bây giờ họ sẽ hoàn toàn bị lãng quên. Tuy nhiên, RX-0 Unicorn Gundam 03, đã biến mất hai năm trước đó, bây giờ sắp xuất hiện trong Earth Sphere một lần nữa. Một phoenix vàng ... tên là Phenex', 40000, 'MA', 'Public/Images\\p113.png', NULL, NULL),
('PC12', 'Mật ngữ diệt vong', 'Doomsday Book là tuyển tập các điều kinh khủng nhất mà bạn có thể tưởng trong ngày tận thế: mưa thiên thạch rơi vào trái đất, virus biến nhân loại thành những thây ma, những con robot với cái nhìn huyền bí hoặc những điều kinh dị mà bạn từng biết...', 70000, 'MA', 'Public/Images\\p113.png', NULL, NULL),
('PC13', 'Harry Poster', 'Harry Potter và Hòn Đá Phù Thủy là bộ phim đầu tiên trong series phim “Harry Potter” được xây dựng dựa trên tiểu thuyết của nhà văn J.K.Rowling. Nhân vật chính của phim, Harry Potter - một cậu bé 11 tuổi sau khi mồ côi cha mẹ đã bị gửi đến nhà dì dượng của mình, gia đình Dursley. Tuy nhiên, cậu bé bị ngược đãi và không hề biết về thân phận thực sự của mình.', 40000, 'FIHD', 'Public/Images\\p99.png', NULL, NULL),
('PC14', 'Bạn ma phiền toái', 'Jang-su (Ma Dong-seok) và Tae-jin (Kim Young-kwang) sở hữu cá tính hoàn toàn đối lập. Là một võ sư nổi tiếng, nhưng Jang-soo lại tỏ ra ích kỷ và chẳng bao giờ chịu giúp đỡ người hoạn nạn. Tất cả những gì anh quan tâm chỉ là lo lắng chữa trị căn bệnh tim bẩm sinh cho cô con gái nhỏ Do-kyung (Choi Yoo-ri).', 10000, 'MA', 'Public/Images\\p107.png', NULL, NULL),
('PC15', 'Màn sương chết', 'Không được báo trước, một trận động đất vô cùng lớn tấn công Paris, cả thành phố sau đó bị bao phủ bởi một lớp sương mù dày đặc. Màn sương chết ấy đang lần lượt cướp đi tính mạng của rất nhiều những người dân nơi đây.', 20000, 'MA', 'Public/Images\\p101.png', NULL, NULL),
('PC16', 'Chờ ngày lời hứa nở hoa', 'Phim lấy bối cảnh thơ mộng của vùng đất huyền diệu nơi tộc người Lorph “trường sinh bất lão” sinh sống, tộc người Lorph sẽ mãi mãi không già, hình dáng của họ ngưng lại ở độ tuổi thiếu niên, họ được gọi với cái tên huyền thoại sống – “Clan of Partings”. Sau một cuộc xâm lăng, cô bé Maquia bị lạc vào vùng đất của con người và bắt gặp một đứa trẻ mồ côi. Từ đó cô quyết định sẽ nuôi nấng em bé mà cô đặt tên là Ariel này bất kể những khó khăn và định kiến của xã hội.', 100000, 'FITC', 'Public/Images\\p109.png', NULL, NULL),
('PC17', 'Sứ mệnh nguy hiểm', 'Bộ phim được làm dựa trên kịch bản chuyển thể từ một phim truyền hình tên là Firefly. Phim kể về cuộc phiêu lưu trong không gian của những người điều hành con tàu Serenity gồm thuyền trưởng Malcolm và các nhân viên là Zoe, Wash, Kaylee và Jayne. Khi Malcolm đồng ý chở 2 vị khách là vị bác sĩ trẻ Simon cùng với người chị có tinh thần bất ổn River thì những rắc rối bắt đầu xảy ra.', 100000, 'FIHD', 'Public/Images\\p93.png', NULL, NULL),
('PC18', 'Chỉ có thể bên em', 'Bộ phim dựa trên câu chuyện đằng sau ca khúc của ban nhạc MercyMe, I Can Only Imagine trở thành ca khúc Christian được chơi nhiều nhất mọi thời đại. Bộ phim xoay quanh ca sĩ chính của MercyMe, Bart Millard, và mối quan hệ của anh với cha mình, người đã mất khi anh 18 tuổi và ông là nguồn cảm hứng để anh sáng tác nên bài hát này. Theo giám đốc Andrew Erwin, nó nói lên một câu chuyện cha-con phức tạp.', 80000, 'FITC', 'Public/Images\\p77.png', NULL, NULL),
('PC19', 'Tinh thần biến', 'Tinh Thần Biến là một tiểu thuyết võ hiệp có nội dung về một câu Truyện Tiên Hiệp hoành tráng kể về người thanh niên Tần Vũ gian khổ tu luyện, vượt hết khó khăn này đến nguy hiểm khác để lên Thần Giới tìm người yêu.', 60000, 'FITC', 'Public/Images\\p89.png', NULL, NULL),
('PC20', 'Đấu la đại lục', 'Nội dung phim ĐẤU LA ĐẠI LỤC: Một đại lục không hề yên bình, một cuộc sống đầy hiểm nguy, phiêu lưu nhưng cũng không kém phần lãng mạn. tình yêu, thù hận, trách nhiệm… Tiếp bước những tiền bối đi trước, Hoắc Vũ Hạo và đời sau sử lai khắc thất quái, bằng niềm tin nhiệt huyết tuổi trẻ đã gây dựng lại đường môn tái lập những huy hoàng xưa kia của các tiền bối đi trước…', 50000, 'FIHD', 'Public/Images\\p5.png', NULL, NULL),
('PC21', 'Phi hành gia', 'Nội dung phim ĐẤU LA ĐẠI LỤC: Một đại lục không hề yên bình, một cuộc sống đầy hiểm nguy, phiêu lưu nhưng cũng không kém phần lãng mạn. tình yêu, thù hận, trách nhiệm… Tiếp bước những tiền bối đi trước, Hoắc Vũ Hạo và đời sau sử lai khắc thất quái, bằng niềm tin nhiệt huyết tuổi trẻ đã gây dựng lại đường môn tái lập những huy hoàng xưa kia của các tiền bối đi trước…', 40000, 'FIHD', 'Public/Images\\p3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `MaLoai` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenTheLoai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`MaLoai`, `TenTheLoai`) VALUES
('FIHD', 'Phim hành động'),
('FITC', 'Phim tình cảm'),
('MA', 'Phim kinh dị');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'duy', 'duy@gmail.com', 1, NULL, '$2y$10$eqvNpar8TwI54t2lo5POQe5a6BwrTg1mHUp89VWiq.p72/FQex1hq', NULL, '2022-03-04 02:50:31', '2022-03-04 02:50:31'),
(2, 'xem', 'xemlaiphim@gmail.com', 0, NULL, '$2y$10$I0o1yHdY7iugfMxmLNVeiuhGKv53J/q8Z.jlQY7bGdpgs9GbzfQQ6', NULL, '2022-03-05 23:43:35', '2022-03-05 23:43:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_makh_foreign` (`MaKH`),
  ADD KEY `binhluan_masp_foreign` (`MaSP`);

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`MaCTHD`),
  ADD KEY `cthd_masp_foreign` (`MaSP`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `hoadon_makh_foreign` (`MaKH`),
  ADD KEY `hoadon_macthd_foreign` (`MaCTHD`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD PRIMARY KEY (`MaSP`),
  ADD UNIQUE KEY `sanphams_tensp_unique` (`TenSP`),
  ADD KEY `sanphams_maloai_foreign` (`MaLoai`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_makh_foreign` FOREIGN KEY (`MaKH`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `binhluan_masp_foreign` FOREIGN KEY (`MaSP`) REFERENCES `sanphams` (`MaSP`);

--
-- Constraints for table `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_masp_foreign` FOREIGN KEY (`MaSP`) REFERENCES `sanphams` (`MaSP`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_macthd_foreign` FOREIGN KEY (`MaCTHD`) REFERENCES `cthd` (`MaCTHD`),
  ADD CONSTRAINT `hoadon_makh_foreign` FOREIGN KEY (`MaKH`) REFERENCES `users` (`id`);

--
-- Constraints for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD CONSTRAINT `sanphams_maloai_foreign` FOREIGN KEY (`MaLoai`) REFERENCES `theloai` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
