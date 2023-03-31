-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 01:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakse`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `cart_id`) VALUES
(2, 13, 20),
(2, 18, 25),
(4, 11, 26),
(2, 14, 27);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `sent_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`name`, `email`, `phone`, `message`, `sent_num`) VALUES
('Elizabeth Boba', 'elibob@mail.com', '25749630', 'Sveiki! Mani sauc Elizabete, un es esmu sociālo mediju influencere. Esmu redzējusi, ka jūs pārdodat sveces, un esmu ieinteresēta ar jums sadarboties. Ja atsūtīsiet man savu sveču komplektu bez maksas, es par tām uztaisīšu video apskatu savās sociālo mediju platformās. Mani sekotāji uzticas manam viedoklim, un tas sniegs jūsu zīmolam lielu atpazīstamību, potenciāli padarot jūs populārāku. Ja jūs interesē šī iespēja, lūdzu, paziņojiet man, un mēs varam sīkākāk visu sarunāt. Paldies par jūsu laiku un uzmanību!', 1),
('Alex Brick', 'alexy@mail.com', '20054675', 'Hello there! My name is Alex and I am a big fan of candles. I came across your candle shop and I am very impressed with your selection and quality of candles. I was wondering if you could provide me with some more information about the scents and materials used to make your candles. I am particularly interested in your vanilla-scented candles and was wondering if you had any special promotions or deals available. Thank you for your time and I look forward to hearing back from you soon.', 2),
('Annabella White', 'whiteanna@mail.com', '24335456', 'Hi there! My name is Anna and I am a lifestyle blogger with a focus on home decor and yoga. I recently came across your candle brand and I am very interested in potentially collaborating with you. I believe that your candles would be a perfect fit for my content and my audience. If you are interested in discussing a potential collaboration, please let me know and we can talk about the details. Thank you for your time and I hope to hear back from you soon.', 3),
('Elsa Red', 'redelsa@mail.com', '24388560', 'Vēlos izteikt lielu pateicību par jūsu profesionālo un uzmanīgo apkalpošanu. Jūsu veikals ir kļuvis par manu galveno atrašanās vietu, kad vēlos radīt mierīgu un romantisku atmosfēru.\n\nEs īpaši novērtēju jūsu pieejamo komplektu izvēli, kas palīdz radīt skaistu dekoru dažādās pasākumu vietās. Jūsu rožu svece ir kļuvusi par manu jauno favorītu, tās ne tikai izskatās lieliski, bet arī sniedz patīkamu aromātu.\n\nVēlos uzsvērt, ka esmu pārliecinātsa, ka jūsu veikalā piedāvātie produkti palīdzēs radīt unikālu un aizraujošu pieredzi jebkurā pasākumā. Jūsu kvalitātes produkts ir pierādījums jūsu rūpēm par klientu vajadzībām un kvalitāti.\n\nPateicos jums par jūsu lielisko darbu un izcilajiem produktiem, kas palīdzēs radīt skaistu, romantisku un mierīgu atmosfēru man un maniem tuviniekiem.\n', 4),
('Deny Shroom', 'shroomdeny@mail.com', '27798890', 'Es vēlos paust savu dziļu apbrīnu par jūsu veikalā piedāvāto unikālo un kvalitatīvo sveču klāstu. Esmu pārliecināts, ka jūsu sveces radīs mierīgu un romantisku atmosfēru jebkurā pasākumā.\nEs īpaši novērtēju jūsu izvēli dažādos aromātos, krāsās un formās, kas piestāvēs jebkurai vajadzībai. Jūsu zemeņu svece ir kļuvusi par manu mīļāko, un es nevaru sagaidīt, lai izmēģinātu arī citus produktus.\nEs arī vēlos teikt, ka esmu priecīgs, ka jūsu veikals izmanto videi draudzīgus materiālus un pieejamas cenas, kas padara jūsu produktus pieejamus ikvienam.\nPateicoties jums, es varu radīt īpašu sajūtu un emocijas gan sev, gan saviem tuviniekiem. Paldies jums par jūsu ieguldījumu, lai pasaulē būtu vairāk skaistuma un romantikas.\n', 5),
('Mellanie Berry', 'meli@mail.com', '24366570', 'Sveiki, šeit Melānija! Es domāju, ka jūsu veikals Rīgā iederētos vienkārši lieliski. Vai esat apsvēruši iespēju šeit Rīgā veikalu? Es labprāt palīdzētu jums  to realizēt. Varam visu sarunāt konkrētāk. Gaidīšu tavu atbildi līdz rītdienai. Veiksmīgu dienu!', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_description`, `product_price`) VALUES
(9, 'Rožu svece', 'candle2.jpg', 'Rožu svece ir izgatavota no dabīgiem materiāliem un bagātināta ar sulīgu rožu aromātu. Tās sārti rozā krāsa un romantiskais aromāts radīs romantisku un mierīgu atmosfēru.', '8.99'),
(11, 'Rozā &amp; Sarkans', 'candle5.jpg', 'Rozā un sarkanās sveces ir pieejamas dažādos aromātos, formas un izmēros, un tās ir lielisks veids, kā radīt romantisku un mierīgu atmosfēru. To krāsas simbolizē mīlestību un aizraušanos, tās ir ideāli piemērotas romantiskiem vakariem', '13.20'),
(12, 'Margrietiņu svece', 'candle7.jpg', 'Margrietiņu svece ir izgatavota no dabīgiem materiāliem un bagātināta ar saldu margrietiņu aromātu. To dekoratīvais izskats un romantiskais aromāts radīs vasarīgu un mierīgu atmosfēru.', '7.99'),
(13, '3 sveču komplekts', 'candle3.jpg', 'Mūsu 3 sveču komplekts ir izvēlēta kolekcija no mūsu labākajiem produktiem. Komplekts ietver dažādas krāsas, aromātus un formas, kas piestāvēs jebkurai vajadzībai. Tas ir lielisks veids, kā iepriecināt sevi vai iepriecināt tuvus cilvēkus ar skaistu un uni', '26.76'),
(14, 'Zemeņu svece', 'candle10.jpg', 'Zemeņu svece ir izgatavota no dabīgiem materiāliem un bagātināta ar zemeņu aromātu. Tās koši sarkanā krāsa un saldais aromāts radīs vasarīgu noskaņu un romantisku atmosfēru.', '5');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_name` varchar(255) NOT NULL,
  `review_text` varchar(2555) NOT NULL,
  `write_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_name`, `review_text`, `write_num`) VALUES
('Anonīms', 'Sveču Veikals ir vieta, kur varat atrast skaistas un kvalitatīvas sveces, lai radītu siltu un mierīgu atmosfēru mājās. Es noteikti ieteiktu to visiem, kas meklē kvalitatīvas sveces un profesionālu apkalpošanu.\n\n', 1),
('CandleLover1', 'Veikala sortiments ir iespaidīgs, ar plašu izvēli no svecēm ar dažādām krāsām un aromātiem. Man ļoti patīk viņu sarkanās rozītes sveces, kas piešķir mājoklim romantisku un mierīgu atmosfēru.', 2),
('Emma Black', 'Es esmu ļoti apmierināta ar savu pieredzi Sveču Veikalā un noteikti ieteiktu to visiem, kuri vēlas mājās radīt romantisku un mierīgu atmosfēru.\nLiels paldies Sveču Veikalam par viņu izcilajiem produktiem un lielisko darbu!', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`, `register_date`) VALUES
(2, 'Monta', 'Montvida', 'monta@gmail.com', '$2y$10$0PyNq5.sxUQ3vfbyTrzwzefooI2658U2eG9IXsl8Z/ooOa3G8N5im', 1, '2023-03-14 21:29:21'),
(3, 'Anabella', 'Sanchez', 'bella@mail.com', '$2y$10$lxSaKhCfhJ.DG5/rrcnKPevpyMQbisp1QvUen0zlrd9kxuGQ.7v1q', 0, '2023-03-15 08:40:57'),
(4, 'Aiden', 'Shoe', 'adams@gmail.com', '$2y$10$UpeO7dS5s6ryzPlJuhCcnugBtJ2f7TY/d1N9/cRxYySniz7.O99DS', 0, '2023-03-17 21:09:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`sent_num`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`write_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `sent_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `write_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
