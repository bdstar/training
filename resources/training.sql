-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 02:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260, '2023-04-29 11:01:17', '2023-04-29 11:01:17'),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263, '2023-04-29 11:01:17', '2023-04-29 11:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `meeting_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Learning Path from Beginner to Expert in C Programming', 5, 'Learning Path from Beginner to Expert in C Programming', '2023-04-29 08:40:07', '2023-04-29 08:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DU', 'University of Dhaka', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(2, 'RU', 'University of Rajshahi', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(3, 'JU', 'Jahangirnagar University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(4, 'CU', 'University of Chittagong', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(5, 'IU', 'Islamic University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(6, 'KU', 'Khulna University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(7, 'JnU', 'Jagannath University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(8, 'CoU', 'Comilla University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(9, 'JKKNIU', 'Jatiya Kabi Kazi Nazrul Islam University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(10, 'BUP', 'Bangladesh University of Professionals', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(11, 'BRU', 'Begum Rokeya University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(12, 'BU', 'University of Barisal', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(13, 'RUB', 'Rabindra University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(14, 'SHU', 'Sheikh Hasina University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(15, 'BSMRU', 'Bangabandhu Sheikh Mujibur Rahman University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(16, 'BSMMU', 'Bangabandhu Sheikh Mujib Medical University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(17, 'CMU', 'Chittagong Medical University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(18, 'RMU', 'Rajshahi Medical University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(19, 'SMU', 'Sylhet Medical University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(20, 'SHMU', 'Sheikh Hasina Medical University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(21, 'SUST', 'Shahjalal University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(22, 'HSTU', 'Hajee Mohammad Danesh Science & Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(23, 'MBSTU', 'Mawlana Bhashani Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(24, 'PSTU', 'Patuakhali Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(25, 'NSTU', 'Noakhali Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(26, 'JUST', 'Jashore University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(27, 'PUST', 'Pabna University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(28, 'BSMRSTU', 'Bangabandhu Sheikh Mujibur Rahman Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(29, 'RMSTU', 'Rangamati Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(30, 'BSFMSTU', 'Bangamata Sheikh Fojilatunnesa Mujib Science & Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(31, 'CSTU', 'Chandpur Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(32, 'SSTU', 'Sunamganj Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(33, 'BSTU', 'Bogura Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(34, 'LSTU', 'Lakshmipur Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(35, 'MIST', 'Military Institute of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(36, 'BAU', 'Bangladesh Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(37, 'BSMRAU', 'Bangabandhu Sheikh Mujibur Rahman Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(38, 'SAU', 'Sher-E-Bangla Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(39, 'SylAU', 'Sylhet Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(40, 'KAU', 'Khulna Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(41, 'HAU', 'Habiganj Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(42, 'KAU', 'Kurigram Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(43, 'BUET', 'Bangladesh University of Engineering & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(44, 'KUET', 'Khulna University of Engineering & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(45, 'CUET', 'Chittagong University of Engineering & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(46, 'RUET', 'Rajshahi University of Engineering & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(47, 'DUET', 'Dhaka University of Engineering & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(48, 'MEC', 'Mymensingh Engineering College', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(49, 'SEC', 'Sylhet Engineering College', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(50, 'FEC', 'Faridpur Engineering College', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(51, 'BEC', 'Barisal Engineering College', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(52, 'CVASU', 'Chittagong Veterinary and Animal Sciences University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(53, 'BUTEX', 'Bangladesh University of Textiles', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(54, 'BSMRMU', 'Bangabandhu Sheikh Mujibur Rahman Maritime University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(55, 'BDU', 'Bangabandhu Sheikh Mujibur Rahman Digital University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(56, 'BSMRAAU', 'Bangabandhu Sheikh Mujibur Rahman Aviation and Aerospace University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(57, 'BOU', 'Bangladesh Open University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(58, 'NU', 'National University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(59, 'IAU', 'Islamic Arabic University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(60, 'IUBAT', 'International University of Business Agriculture and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(61, 'NSU', 'North South University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(62, 'IUB', 'Independent University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(63, 'AIUB', 'American International University-Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(64, 'DIU', 'Dhaka International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(65, 'IIUC', 'International Islamic University, Chittagong', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(66, 'AUB', 'Asian University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(67, 'EWU', 'East West University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(68, 'GB', 'Gono Bishwabidyalay', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(69, 'PUB', 'Peoples University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(70, 'QU', 'Queens University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(71, 'UAP', 'University of Asia Pacific', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(72, 'CIU', 'Chittagong Independent University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(73, 'BUFT', 'BGMEA University of Fashion & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(74, 'BU', 'Bangladesh University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(75, 'BGCTUB', 'BGC Trust University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(76, 'BRAC', 'BRAC University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(77, 'MIU', 'Manarat International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(78, 'PU', 'Premier University, Chittagong', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(79, 'SUB', 'Southern University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(80, 'SIU', 'Sylhet International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(81, 'UODA', 'University of Development Alternative', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(82, 'CUB', 'City University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(83, 'DIU', 'Daffodil International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(84, 'GUB', 'Green University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(85, 'IU', 'IBAIS University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(86, 'LU', 'Leading University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(87, 'NUB', 'Northern University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(88, 'PU', 'Prime University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(89, 'SEU', 'Southeast University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(90, 'SU', 'Stamford University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(91, 'SUB', 'State University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(92, 'EU', 'Eastern University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(93, 'MU', 'Metropolitan University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(94, 'MU', 'Millennium University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(95, 'PAU', 'Primeasia University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(96, 'RUD', 'Royal University of Dhaka', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(97, 'UIU', 'United International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(98, 'UITS', 'University of Information Technology and Sciences', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(99, 'USAB', 'University of South Asia, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(100, 'UU', 'Uttara University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(101, 'VUB', 'Victoria University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(102, 'WUB', 'World University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(103, 'ASAUB', 'Asa University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(104, 'BIU', 'Bangladesh Islami University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(105, 'EDU', 'East Delta University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(106, 'NUB', 'Northern University of Business and Technology Khulna', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(107, 'BU', 'Britannia University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(108, 'FU', 'Feni University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(109, 'KYAU', 'Khwaja Yunus Ali University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(110, 'EUB', 'European University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(111, 'FCUB', 'First Capital University Of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(112, 'HUB', 'Hamdard University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(113, 'IIUB', 'Ishakha International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(114, 'NEUB', 'North East University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(115, 'NWU', 'North Western University, Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(116, 'PCIU', 'Port City International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(117, 'VU', 'Varendra University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(118, 'SU', 'Sonargaon University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(119, 'CBIU', 'Coxs Bazar International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(120, 'FIU', 'Fareast International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(121, 'GUB', 'German University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(122, 'NBIU', 'North Bengal International University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(123, 'NDUB', 'Notre Dame University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(124, 'RPSU', 'Ranada Prasad Shaha University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(125, 'SFMMU', 'Sheikh Fazilatunnesa Mujib University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(126, 'TMUB', 'Times University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(127, 'CUST', 'Canadian University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(128, 'GUB', 'Global University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(129, 'NPIUB', 'NPI University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(130, 'RMU', 'Rabindra Maitree University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(131, 'IUS', 'The International University of Scholars', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(132, 'UCTC', 'University of Creative Technology Chittagong', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(133, 'CUB', 'Canadian University of Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(134, 'AKMU', 'Anwer Khan Modern University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(135, 'UIGV', 'University of Global Village', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(136, 'TU', 'Trust University, Barishal', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(137, 'UOB', 'University of Brahmanbaria', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(138, 'USET', 'University of Skill Enrichment and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(139, 'ISU', 'International Standard University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(140, 'ZUMS', 'ZNRF University of Management Sciences', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(141, 'BU', 'Bandarban University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(142, 'RTM-AKTU', 'RTM Al-Kabir Technical University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(143, 'USTC', 'University of Science & Technology Chittagong', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(144, 'AUST', 'Ahsanullah University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(145, 'PUST', 'Pundra University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(146, 'BUBT', 'Bangladesh University of Business and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(147, 'PU', 'Presidency University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(148, 'ADUST', 'Atish Dipankar University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(149, 'ZHSUST', 'ZH Sikder University of Science & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(150, 'RSTU', 'Rajshahi Science & Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(151, 'BAIUST', 'Bangladesh Army International University of Science & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(152, 'BAUST', 'Bangladesh Army University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(153, 'CCNUST', 'CCN University of Science & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(154, 'CUST', 'Central University of Science and Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(155, 'CWU', 'Central Womens University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(156, 'SMUCT', 'Shanto-Mariam University of Creative Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(157, 'ULAB', 'University of Liberal Arts Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(158, 'BUHS', 'Bangladesh University of Health Sciences', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(159, 'EBAUB', 'Exim Bank Agricultural University Bangladesh', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(160, 'BAUET', 'Bangladesh Army University of Engineering & Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(161, 'TUCA', 'Tagore University of Creative Arts', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(162, 'IUT', 'Islamic University of Technology', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(163, 'AUW', 'Asian University for Women', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(164, 'RSTU', 'Rangpur Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(165, 'SHAU', 'Sheikh Hasina Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(166, 'WMAU', 'Dr. M A Wazed Miah Agricultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(167, 'BPU', 'Bangabandhu Public University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(168, 'MUET', 'Mymensingh Engineering College (MEC) to Mymensingh University of Engineering & Technology (MUET)', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(169, 'MMU', 'Mymensingh Medical University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(170, 'ThU', 'Thakurgaon University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(171, 'MU', 'Mujibnagar University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(172, 'JJBSMRSTU', 'Jatir Janak Bangabandhu Sheikh Mujibur Rahman Science and Technology University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(173, 'BSMRSTUP', 'Bangabandhu Sheikh Mujibur Rahman Science and Technology University, Pirojpur', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(174, 'MSUB', 'Marine Science University of Barisal', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(175, 'MMCU', 'Michael Madhusudan Cultural University', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(176, 'BUJS', 'Bangladesh University of Juridical Sciences', '2023-04-27 17:19:22', '2023-04-27 17:19:22'),
(177, 'BUEdPA', 'Bangladesh University of Educational Planning and Administration', '2023-04-27 17:19:22', '2023-04-27 17:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Webinar', 'Webinar', '2023-04-29 08:47:39', '2023-04-29 04:47:39'),
(2, 'Conference', 'Conference', '2023-04-29 08:48:06', '2023-04-29 04:48:06'),
(3, 'Training', 'Training', '2023-04-29 08:48:17', '2023-04-29 04:48:17'),
(4, 'Live Classes', 'Live Classes', '2023-04-29 08:48:37', '2023-04-29 04:48:37'),
(5, 'Online Live Session', 'Online Live Session', '2023-04-29 08:48:50', '2023-04-29 04:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Student', 'Student', '2023-04-27 16:40:37', '2023-04-27 12:40:37'),
(2, 'Professional', 'Professional', '2023-04-27 16:41:24', '2023-04-27 12:41:24'),
(3, 'Seeking Job', 'Seeking Job', '2023-04-27 16:41:45', '2023-04-27 12:41:45'),
(4, 'Fresher', 'Fresher', '2023-04-27 16:41:55', '2023-04-27 12:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 18,
  `institution_id` int(11) NOT NULL,
  `admission` int(11) NOT NULL,
  `study` varchar(200) NOT NULL,
  `profession_id` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `approved` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `courses_meeting` (`meeting_id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profession type` (`name`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_registration` (`course_id`),
  ADD KEY `institution_registration` (`institution_id`),
  ADD KEY `profession_registration` (`profession_id`),
  ADD KEY `country_registration` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_meeting` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `country_registration` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `course_registration` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `institution_registration` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profession_registration` FOREIGN KEY (`profession_id`) REFERENCES `profession` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
