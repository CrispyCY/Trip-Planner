-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 03:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `password`) VALUES
('admin1', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `attraction`
--

CREATE TABLE `attraction` (
  `attID` varchar(255) COLLATE utf8_bin NOT NULL,
  `attName` varchar(255) COLLATE utf8_bin NOT NULL,
  `location` varchar(255) COLLATE utf8_bin NOT NULL,
  `descp` mediumtext COLLATE utf8_bin NOT NULL,
  `long_descp` mediumtext COLLATE utf8_bin NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `opHr` varchar(255) COLLATE utf8_bin NOT NULL,
  `rcmDur` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_bin NOT NULL,
  `tags` varchar(255) COLLATE utf8_bin NOT NULL,
  `imgName` varchar(255) COLLATE utf8_bin NOT NULL,
  `img2Name` varchar(255) COLLATE utf8_bin NOT NULL,
  `map_url` mediumtext COLLATE utf8_bin NOT NULL,
  `stateID` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `attraction`
--

INSERT INTO `attraction` (`attID`, `attName`, `location`, `descp`, `long_descp`, `cost`, `opHr`, `rcmDur`, `category`, `tags`, `imgName`, `img2Name`, `map_url`, `stateID`) VALUES
('att1', 'Ipoh Heritage Walks', 'PERAK', 'Take yourself on my Ipoh Heritage Walk, a walking tour of old Ipoh. I have prepared a map and information on over 30 historic buildings and points of interest for you to explore.', 'Ipoh Heritage Walk is a leisurely stroll around the compact and historic old town area of Ipoh. The walk is about 4 miles long but you can extend or shorten it depending on your energy levels.  In just over 130 years Ipoh transformed itself from a sleepy Malay village to the bustling metropolis it is today, the fourth largest city in Malaysia with a population of over 700,000.  Its boom period began around 1880 and lasted until well into the 1930s, largely on the back of tin mining and it became known as the town that tin built. The tin rush drew in hordes of migrants, mostly Chinese, many of whom went on to build substantial fortunes.  This wealth is reflected in the architecture of the period and many fine buildings remain in the old part of the city, west of the River Kinta, and are covered in this Ipoh Heritage Walk.', '50.50', '6am - 10pm', 4, 'Indoors,Outdoors', 'relaxing, historic, romantic, shopping, wildlife, culture', 'pr-1.jpg', 'pr-1-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31816.29182649553!2d101.05027677238114!3d4.587475986696889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31caec7c6bf9ecc9%3A0x30b5a98f71fff4d1!2sIpoh%20Mural%20-%20Old%20Town%20Relieves%20Nostalgia%20with%20Trishaw!5e0!3m2!1sen!2smy!4v1616495518892!5m2!1sen!2smy', 'st1'),
('att10', 'Seen Hock Yeen Confucius Temple', 'PERAK', 'Seen Hock Yeen Temple is a popular temple for devotees of Confucius hoping for good health, a good marriage partner, to pray for children\'s scholastic success or to dispel problems.', 'Seen Hock Yeen Temple is a popular temple for devotees of Confucius hoping for good health, a good marriage partner, to pray for children\'s scholastic success or to dispel problems.On significant occasions such as Confucius\' birthday, the Empress of Heaven birthday or the anniversary of the temple\'s establishment, devotees flock to the temple in their thousands, many bussed in from other states in Malaysia. Students pray at the chamber dedicated to Confucius for success in their exams and young children crawl under the altar three times to improve their results at school.', '5.00', '10am - 6pm', 7, 'Indoors,Outdoors', 'historic, relaxing, culture', 'pr-10.jpg', 'pr-10-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.2209953464126!2d101.12466071476246!3d4.731634896563424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31ca919abbe421af%3A0xdc33b5b33ae9ea89!2sSeen%20Hock%20Yeen%20Confucius%20Temple!5e0!3m2!1sen!2smy!4v1617977531886!5m2!1sen!2smy', 'st1'),
('att11', 'Pulau Pangkor', 'PERAK', 'Beautiful white sand, clear blue skies, crystal clear waters, wonderful coral reefs and flora and fauna…little wonder many people who visited Pangkor Island had great impressions about the place, calling it an island paradise.', 'What do you do on an island? Explore the beautiful beaches of course! Pangkor Island has a few pretty beaches worth setting up a beach chair or mat and basking under the sun while enjoying the lovely views they offer. \r\nPantai Pasir Bogak is the most popular beach on the island followed by Nipah beach at Nipah Bay (or Teluk Nipah). Other notable beaches include Ketapang beach at Teluk Ketapang and the secluded Segadas beach at Teluk Segadas, though for Segadas beach, reaching there may be tougher than others. \r\nYou will need to travel by foot for about 25 minutes from Teluk Gedung town via a jungle route to reach the secret beach, but the trip is worth it since Segadas beach is known to be the most beautiful beach at Pangkor Island.', '100.00', '8am - 11pm', 6, 'Indoors,Outdoors', '', 'pr-11.jpg', 'pr-11-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63663.43567191464!2d100.52407734015382!3d4.227136713286474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3034d396cbb7f341%3A0xc8f2ba9f74ec3895!2sPangkor%20Island!5e0!3m2!1sen!2smy!4v1617962237651!5m2!1sen!2smy', 'st1'),
('att12', 'Banding Island', 'PERAK', 'Banding Island is an ideal base for exploring Lake Temenggor and the Royal Belum Rainforest. It is definitely one of Malaysia\'s most beautiful areas and a place I would like to return to and spend more time.', 'Lake Temenggor is huge, over 70 kilometres in length, up to 5 km wide in places and as deep as 120 metres.\r\nIt is a man-made lake created in the late 1960s and early 1970s by constructing Temenggor Dam and flooding the valleys of the Upper Perak River and its tributaries. This accounts for its highly irregular shape. Banding Island would have been a hill-top before the valley was flooded.\r\nTemenggor Lake is surrounded by the Royal Belum Rainforest, a vast stretch of 130 million year old virgin rainforest, one of the last refuges in Peninsular Malaysia for wild animals such as elephants, tapirs, tigers and 10 species of hornbill.', '30.00', '9am - 6pm', 5, 'Indoors,Outdoors', 'relaxing, romantic, shopping, wildlife, culture', 'pr-12.jpg', 'pr-12-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31768.91812237145!2d101.31582336792727!3d5.54999964245585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b500a4e866b4e7%3A0x3f1cc5ba047ca346!2sBanding%20Island!5e0!3m2!1sen!2smy!4v1617962796080!5m2!1sen!2smy', 'st1'),
('att13', 'Gaharu Tea Valley Gopeng', 'PERAK', 'Gaharu Tea Valley is an agarwood plantation just outside Gopeng, Perak and has become something of an agro-tourism destination.\r\nAgarwood (also known as gaharu in Malay or oud in Arabic) is an aromatic resinous wood which forms inside aquilaria trees when they become infected with a certain type of mould.', 'Agarwood is highly prized for its powerful, exotic fragrance as well as its medicinal and health-giving properties. Its popularity in Middle Eastern and Chinese cultures and its high commercial value has led to agarwood becoming rare and endangered in the wild.\r\nThis 300 acre project, with over 200,000 organically cultivated trees of various ages, is helping to conserve the aquilaria species.\r\n\r\nThe project began around two decades ago but the facilities have only been open to the public for the past couple of years.', '20.00', '9.30am - 7pm', 5, 'Outdoors', 'shopping, relaxing, culture, romantic, wildlife', 'pr-13.jpg', 'pr-13-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.7411959251417!2d101.19078981476149!3d4.45915379675969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cafa925055fc65%3A0x268dae88c39b3798!2zSE9HQSwgR2FoYXJ1IFRlYSBWYWxsZXkgR29wZW5nIOWKoei-ueayiemmmeWxseiMtuWbrSBBZ2Fyd29vZCBTYW5jdHVhcnk!5e0!3m2!1sen!2smy!4v1617963027783!5m2!1sen!2smy', 'st1'),
('att14', 'Lenggong Valley Archaeological Gallery', 'PERAK', '‘Perak Man’ is the name given to the skeletal remains of a man thought to have lived about 11,000 years ago in the Lenggong Valley district of Hulu Perak.', 'It is the oldest human skeleton found so far in Peninsular Malaysia. The remains were discovered in 1991 in a cave called Gua Gunung Runtuh, a few kilometres north of the town of Lenggong and 105 m above sea level.\r\n\r\nThe skeleton and other exhibits found in the Lenggong Valley area are now showcased in a museum, the Lenggong Valley Archaeological Gallery at the village of Kota Tampan, just south of Lenggong.', '25.00', '9am - 7pm', 5, 'Indoors', 'relaxing, historic, culture', 'pr-14.jpg', 'pr-14-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.316233809468!2d100.96406731476372!3d5.052389996332794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b55de3ab5b18fd%3A0xc763e48f26b2ff1d!2sLenggong%20Valley%20Archeological%20Gallery!5e0!3m2!1sen!2smy!4v1617963360546!5m2!1sen!2smy', 'st1'),
('att15', 'The Hakka Miners’ Club', 'PERAK', 'Han Chin Pet Soo, which translates as Han Chin Villa, is Ipoh’s latest attraction, a fascinating museum-style exhibition in the beautifully restored Hakka Miners’ Club building.', 'The exhibition also tells the story of the Hakka people and gives an explanation of the tin mining industry. It provides an insight into the shadowy goings-on at the tin miners’ club where prostitution, gambling, opium smoking and triad activities were carried out behind the elegant facade of the club. It is rare to have the opportunity to go inside such a well preserved heritage building in Malaysia, especially one that has faithfully retained its original look and purpose. \r\n\r\nThis place should definitely be on your itinerary if you are visiting Ipoh. ', '35.00', '9.30am - 6pm', 5, 'Indoors', 'shopping, historic, culture, relaxing', 'pr-15.jpg', 'pr-15-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.9872466116794!2d101.07683231476192!3d4.596306996660851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31caec7c5018dbef%3A0x253d2a595a1ff9b4!2sHan%20Chin%20Pet%20Soo!5e0!3m2!1sen!2smy!4v1617963539076!5m2!1sen!2smy', 'st1'),
('att16', 'Kuala Kangsar Heritage Trail', 'PERAK', 'Kuala Kangsar is one of Malaysia’s prettiest towns and is packed full of palaces, mosques and other historical sites. This trail covers all the famous attractions and a few lesser known places of interest. ', 'Welcome to Malaysia Traveller\'s self-guided Kuala Kangsar Heritage Trail, the best way to experience the highlights of Kuala Kangsar, Perak\'s royal town. The trail provides a full list of what to see. Kuala Kangsar is not a big town but its sites are somewhat spread out and this trail covers a distance of roughly 10 km.  While I usually like to cover the whole distance on foot, I must admit that it was a particularly sweltering day on my recent visit and I traveled by car for some sections. ', '35.00', '8.30am - 7.30pm', 7, 'Indoors,Outdoors', 'shopping, historic, culture, relaxing, romantic, wildlife', 'pr-16.jpg', 'pr-16-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d508961.36607383384!2d100.63518495088452!3d4.7247224581172285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cabdcca31694e3%3A0x914d9b06145df81b!2sKuala%20kangsar!5e0!3m2!1sen!2smy!4v1617964005182!5m2!1sen!2smy', 'st1'),
('att17', 'Tua Pek Kong Temple', 'PERAK', 'There are a number of Tua Pek Kong Temples dotted around Malaysia. It is thought to be over 100 years old but has undergone rapid changes in recent years, with the addition of more statues, a dragon tunnel, surrounding walls and a pagoda.', 'Looking out to sea over the Straits of Malacca is a row of giant white stone statues including a seated Tua Pek Kong himself, flanked by Guan Yin, other deities, tigers, lions and monkeys.\r\n\r\nThe compound is surrounded by a castellated high wall and visitors can walk around on the ramparts.\r\nThere is an attractive landscaped garden with koi ponds, artificial rocks and more statues. A large seated Maitreya Buddha statue occupies pride of place in the centre of the temple.\r\n', '10.00', '8.30am - 7.30pm', 3, 'Indoors', 'historic, culture, relaxing, wildlife', 'pr-17.jpg', 'pr-17-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1018698.5962858163!2d100.12817216562499!3d4.163009900000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb2dc2699dc5d7%3A0x31b8ca7fce083111!2sTua%20Pek%20Kong%20Temple!5e0!3m2!1sen!2smy!4v1617976124255!5m2!1sen!2smy', 'st1'),
('att18', 'Enlightened Heart Buddhist Temple', 'PERAK', 'Enlightened Heart Buddhist Temple is a sprawling Tibetan temple complex with a tall pagoda tucked away in a hidden valley near Ipoh. Unusual and interesting, this is one of the top Perak attractions and well worth a visit.', 'Enlightened Heart Buddhist Temple is a sprawling Tibetan temple complex with a tall pagoda tucked away in a hidden valley in the Tambun district of Ipoh, Perak.\r\n\r\nThis temple, with its imposing 13 storey pagoda and large standing Buddha statue, should be one of the top tourist attractions in Perak but it appears to be less visited than it deserves, perhaps due to its out-of-the-way location.The pagoda, known as the Enlightened Heart Medicine Buddha Bhaishaya Guru Pagoda, measures 72 metres in height making it one of the tallest in the world, though far behind the Tianning pagoda in China which, at 154 m, is over double the height.', '15.00', '8am - 6.30pm', 3, 'Indoors', 'historic, culture, relaxing', 'pr-18.jpg', 'pr-18-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.945665537844!2d101.15204031476195!3d4.603752496655497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31caed7bdb99b07b%3A0x27cfcf9c9306b73f!2sEnlightened%20Heart%20Buddhist%20Temple!5e0!3m2!1sen!2smy!4v1617976439515!5m2!1sen!2smy', 'st1'),
('att19', 'Tasik Cermin', 'PERAK', 'Tasik Cermin (Mirror Lake) is a stunning hidden lake surrounded by limestone karst towers. You need to walk through a quarry and a tunnel to reach it.', 'Fancy a visit to Ipoh anytime soon? Why not visit Tasik Cermin while you’re there? Tasik Cermin is a hidden gem in Ipoh that you should totally explore! Literally translated as “Mirror Lake”, Tasik Cermin is tucked in between the many limestone karst formations that are synonymous with the city that is Ipoh in Perak, Malaysia. If you don’t already know, these limestone hills have earned the city the nickname “Guilin of Malaysia”!Tasik Cermin is situated in Gunung Rapat, a 20-minute drive from the heart of Ipoh. The neighbouring location used to be an active quarry that has thankfully minimized its operations. While it is relatively safe to visit now, you should continue to practise caution and be extra careful when making your way to the lake.', '10.00', '10.30am - 6.30pm', 4, 'Outdoors', 'historic, culture, relaxing, romantic, wildlife', 'pr-19.jpg', 'pr-19-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.191965068121!2d101.11766291366563!3d4.559473244138167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31caed261a2c7545%3A0xa96c1d199879626!2sTasik%20Cermin!5e0!3m2!1sen!2smy!4v1617976707170!5m2!1sen!2smy', 'st1'),
('att2', 'Gua Tempurong', 'PERAK', 'Tempurong Cave is one of the largest natural limestone caves in Malaysia stretching over 1.5km. It is a show cave with safe walkways and illuminated to reveal its natural beauty. It is easy to get to.', 'A lot of work went into creating this massive cave. First of all this entire area, known as the Kinta Valley, needed to be covered by sea.  Billions of microscopic marine organisms had to die and fall to the ocean floor where their tiny shells were compressed into limestone.  Then the ocean floor had to be uplifted from under the sea by massive movements of the earth\'s crust.  Finally rainfall and flowing water had to work its magic for the next 250 million years or so, carving sinkholes, chimneys and galleries from the limestone rock.  Meanwhile millions of specs of calcium carbonate contained in drops of dissolved limestone coagulated together at an infinitesimally slow rate to create the wonders of stalagmites and stalactites.  That\'s why we humans have to look after our caves. If we break off a piece of stalactite it won\'t grow back in our lifetime (they grow at the rate of 1 inch every 200 years on average).', '6.67', '8.30am - 9.30pm', 6, 'Outdoors', 'historic, wildlife, culture, shopping', 'pr-2.jpg', 'pr-2-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.9736538479783!2d101.18549651405351!3d4.416009396790786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cafb14dbb8742d%3A0xacb03b8d7a0bcea2!2sTempurung%20Cave!5e0!3m2!1sen!2smy!4v1616497830947!5m2!1sen!2smy', 'st1'),
('att20', 'Dutch Fort Pangkor Island', 'PERAK', 'Dutch Fort Pangkor Island is the remains of an old warehouse built by the Dutch in 1670 to store tin ore. It has been partially restored as a tourist attraction.', 'Dutch Fort Pangkor Island (Kota Belanda) is the remains of an old 17th century warehouse built by the Dutch to store tin ore. It is located at a scenic beachside fishing village called Kampung Teluk Gedung (gedung can be translated as godown or warehouse).The site of the fort has been enhanced with a patterned lawn, a view tower (closed during my visit), toilets and a row of souvenir/snack shops built with a hint of Dutch-style architecture.From Pangkor Island Jetty it is easy to hire one of the ubiquitous pink minivan taxis that you find on Pangkor, or you can rent a motorbike. I walked from the jetty and it took about 20 minutes. There is no proper pavement or sidewalk so you have to walk on the road most of the way but traffic is light and consists mostly of motorbikes so it is not too dangerous.', '70.00', '10am - 7pm', 4, 'Indoors,Outdoors', 'historic, culture, relaxing, romantic, wildlife', 'pr-20.jpg', 'pr-20-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.100894734724!2d100.57361661476052!3d4.200524996946212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3034d2ff95c787c7%3A0x435c99563bc5bb47!2sDutch%20Fort!5e0!3m2!1sen!2smy!4v1617977198256!5m2!1sen!2smy', 'st1'),
('att21', 'i-City, Shah Alam', 'SELANGOR', 'This has to be one of the most popular family attractions in Malaysia. You can cool off in Snowalk, an indoor snow park with ice houses, snowmen and a mini-bobsled run, while outdoors is a fantasy forest of digital lights which is really spectacular. Recent additions include a big wheel and other fairground rides.', 'Snow in Malaysia? Yes, it\'s possible. Take the kids to Snowalk at i-City for something completely different.\r\n\r\nThis is a technology park located on the outskirts of Shah Alam. At night the place comes alive with an amazing forest of man-made trees brightly illuminated with millions of colourful LED lights.\r\nThey call this the City of Digital Lights.Next to the forest of lights is Snowalk which is an indoor snow park where visitors can escape from the tropical heat for a while and experience 5 degree temperatures. For some Malaysians who have never seen snow before it is a novel experience. If you are from Canada or Russia you will be less impressed but it is still worth a visit.', '200.00', '8am - 9pm', 7, 'Indoors,Outdoors', 'culture, relaxing, romantic, shopping', 'sl-1.jpg', 'sl-1-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7968.23175615374!2d101.47864417413868!3d3.063678991075855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc52e31e99d239%3A0x2ec8194a470d6bf6!2sI-City%2C%2040000%20Shah%20Alam%2C%20Selangor!5e0!3m2!1sen!2smy!4v1617979784800!5m2!1sen!2smy', 'st2'),
('att22', 'Sunway Lagoon Theme Park', 'SELANGOR', 'Sunway Lagoon is one of Malaysia\'s top theme parks and one of the best in Asia with a water park, an amusement park, a wildlife park, extreme park and scream park.', 'Sunway Lagoon is spread over 80 acres and is part of the wider 800 acre Sunway Integrated Resort City which includes a 5 star hotel, a very popular shopping mall, residential blocks, a hospital and more. Built on derelict tin mining land in Petaling Jaya south of Kuala Lumpur, the development is a successful example of rehabilitating an industrial wasteland.', '138.00', '10am - 6pm', 7, 'Indoors,Outdoors', 'culture, relaxing, romantic, shopping, wildlife', 'sl-2.jpg', 'sl-2-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7968.190542979539!2d101.60264927413877!3d3.069210841059777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4c88dded3125%3A0xdb654cc77af0cdbc!2sSunway%20Lagoon!5e0!3m2!1sen!2smy!4v1617980011585!5m2!1sen!2smy', 'st2'),
('att23', 'Zoo Negara', 'SELANGOR', 'Located on the fringe of KL, this zoo is a popular Selangor tourist attraction. It is a large zoo set in lush tropical landscaping with all the usual zoo-ey attractions. New! the Giant Panda Conservation Centre is now open. Read details here.', 'It\'s Malaysia\'s largest zoo, covering 44 hectares (110 acres), making it twice as big as the second largest, Melaka Zoo.\r\n\r\nIt is located on the north eastern outskirts of Kuala Lumpur in the shadow of the spectacular Bukit Tabur (Klang Gates Quartz Ridge). Although urban development has more or less surrounded the zoo, it is still a green and pleasant area.\r\n\r\nThe zoo is managed by a non-governmental organisation, the Malaysian Zoological Society, and relies on ticket proceeds together with corporate and private sponsorship/donations to offset its considerable running costs. ', '45.00', '9am - 5pm', 6, 'Indoors,Outdoors', 'culture, relaxing, shopping, wildlife, historic', 'sl-3.jpg', 'sl-3-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.5575987014813!2d101.75699501475745!3d3.2101850976627126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc39b60a831fe1%3A0xf2c800c702db7b2f!2sZoo%20Negara%20Malaysia!5e0!3m2!1sen!2smy!4v1617980270801!5m2!1sen!2smy', 'st2'),
('att24', 'Sepang International Circuit', 'SELANGOR', 'This race track is home to Malaysia\'s Formula 1 and other motor sport events. It is possible to do Go-Karting here. There is also a National Automobile Museum which is worth a quick look.', 'Motorsport enthusiasts will love Sepang International Circuit, home to the Malaysian Formula 1 and other motorsport events.Also known as the Sepang F1 Circuit, this purpose built complex is located at Sepang, close to Kuala Lumpur international Airport and about 85km from KL city centre.\r\n\r\nIt hosts various events including Formula 1 (this year to be held from 28th - 30th March 2014), MotoGP, the Malaysia Merdeka Endurance Race, Malaysian Super Series, Sepang 1000km Endurance Race and Sepang Drag Battle.\r\n\r\nGrandstands at the track side can accommodate 130,000 spectators.\r\n\r\nEven when no event is being staged, there are still fun things to do here.', '155.50', '9.30am - 5.30pm', 3, 'Outdoors', '', 'sl-4.jpg', 'sl-4-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.192084536168!2d101.72958881475637!3d2.7594143979898185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdbf398d4aded7%3A0xb8bc177e144ada57!2sSepang%20International%20Circuit!5e0!3m2!1sen!2smy!4v1617980501171!5m2!1sen!2smy', 'st2'),
('att25', 'Crab Island - Pulau Ketam', 'SELANGOR', 'If you enjoy seafood, a trip to Crab Island is a must. The ferry journey itself is quite interesting and on the island you can see the lifestyle of a typical Chinese fishing community.', 'A trip to Crab Island or Pulau Ketam makes an enjoyable family outing from Kuala Lumpur.\r\n\r\nPulau Ketam itself is low-lying, muddy and fringed with mangroves forest which is an ideal habitat for the crabs and other marine crustaceans which inhabit these waters. The island was first settled by a group of fishermen from Hainan in southern China in the 1870s. Today it is home to a community of about 8000, majority Chinese, who have built mostly wooden homes on stilts over the soft tidal mudflats. Services such as schools, a clinic, police station and electricity have been added over the years.There are two settlements on the island, Pulau Ketam village and Sungai Lima village. There are no roads or cars and the only way to get around is by boat or walking/cycling on the narrow wooden or concrete boardwalks within the village.', '0.00', '6.00am - 6.30pm', 6, 'Indoors,Outdoors', 'culture, relaxing, romantic, shopping', 'sl-5.jpg', 'sl-5-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63747.717426911346!2d101.20956278922733!3d3.0322254346756266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cd01f89c61a35d%3A0xd153097b1e00290d!2sPulau%20Ketam!5e0!3m2!1sen!2smy!4v1617980812234!5m2!1sen!2smy', 'st2'),
('att26', 'Kuala Selangor', 'SELANGOR', 'This quiet corner of Selangor has a number of attractions - Bukit Melawati with an old lighthouse and inquisitive monkeys, one of the world\'s largest colonies of fireflies and a nature park. ', 'There is more to Kuala Selangor attractions than just fireflies and monkeys.\r\n\r\nThis small historic town is a hidden gem with a lot for visitors to see.The ruins of this fort, also known as Bukit Belanda (literally ‘Dutch Hill’) are located on a low hill close to the mouth of the Selangor River. The Kuala Selangor Lighthouse is the town\'s most famous landmark and symbol. It was built in 1907 and is also known as the Altingsburg Lighthouse which was the old Dutch name for Bukit Melawati. It is 27m high and its light can be seen 18 nautical miles away. It is not open to the public.', '70.00', '9.00am - 5.30pm', 6, 'Indoors,Outdoors', 'historic, culture, relaxing, shopping, wildlife, romantic', 'sl-6.jpg', 'sl-6-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127455.45489327052!2d101.21329482096174!3d3.354313326252153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc8b3328f2832f%3A0xdc05582fccc0811d!2sKuala%20Selangor%2C%20Selangor!5e0!3m2!1sen!2smy!4v1617981260049!5m2!1sen!2smy', 'st2'),
('att27', 'Paya Indah Wetlands', 'SELANGOR', 'Talking of nature parks, Paya Indah near Putrajaya is a man-made wetlands area with crocodiles and hippos among its star attractions. Fishing, kayaking and bird watching are possible here and accommodation is available.', 'Paya Indah Wetlands is a nice place to find peace and quiet and enjoy nature away from the busy city. \r\nPaya Indah (which means \'beautiful swamp\') is a man-made wetlands area created in 1998 on land which had been heavily degraded by tin mining and sand dredging activities.New trees were planted and are now maturing which, combined with the surviving earlier forest, are attracting a wide variety of bird species, insects and animals.\r\n\r\nThe Department of Wildlife & National Parks has done a good job over the past year in regenerating this eco-tourism park\'s facilities which had earlier seemed to be unutilised.', '20.00', '8.00am - 6pm', 5, 'Outdoors', 'culture, relaxing, wildlife', 'sl-7.jpg', 'sl-7-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.847419933792!2d101.62658011475658!3d2.8603797979165098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb83812b47327%3A0x709e95ebb1dceb08!2sPaya%20Indah%20Wetlands!5e0!3m2!1sen!2smy!4v1617981645551!5m2!1sen!2smy', 'st2'),
('att28', 'Klang Gates Quartz Ridge', 'SELANGOR', 'The first one is Klang Gates Quartz Ridge which is an invigorating but not too difficult walk along the spine of a quartz dyke from where you can get great views of Kuala Lumpur. This hidden secret could be one of the top Selangor attractions if it were better known.', 'You have probably noticed Klang Gates Quartz Ridge if you have ever driven along KL\'s Middle Ring Road near Zoo Negara. It is that impressive line of hills rising up abruptly beyond the edge of the city.Also known as Bukit Tabur, this rare geological feature is said to be the largest pure quartz dyke in the world. Shaped like a protruding backbone, it measures 14km in length and its ridge is no wider than 200m, narrowing down to just a few meters in places. As far as Malaysian mountains go it is not particularly high, ranking 291st on my list of Malaysia\'s Highest 300 Mountains but it still provides an energetic and challenging hike.', '30.00', '7am - 5pm', 6, 'Outdoors', 'historic, culture, relaxing, wildlife', 'sl-8.jpg', 'sl-8-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.4677047384553!2d101.75210951475758!3d3.2331555976460638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc3901bdb1d853%3A0x6a4a837a9c95b8b6!2sKlang%20Gates%20Quartz%20Ridge!5e0!3m2!1sen!2smy!4v1617981913396!5m2!1sen!2smy', 'st2'),
('att29', 'Broga Hill', 'SELANGOR', 'Other favourite hill climb is Bukit Broga, a 400 meter high peak which is one of the few in Malaysia not covered in dense jungle so you get lovely views. It\'s a steep climb but worth it.', 'Bukit Broga (Broga Hill) is one of the best places to hike within easy range of Kuala Lumpur. It is only 400 metres high (1312 feet) and can easily be climbed in an hour but it is steep and challenging enough to get the heart pumping and lungs puffing. What’s more, it is about the only hill or mountain in Peninsular Malaysia which is covered in lalang grass instead of trees so the views from the top are excellent.The trail is well worn and easy to follow. It gets busy, especially at weekends and at dawn when many climber like to witness the sun rise. Thousands of feet have eroded the path. Stay on the main path to avoid causing further damage to the hillside.', '40.00', '7am - 6pm', 5, 'Outdoors', 'historic, culture, relaxing, wildlife, romantic', 'sl-9.jpg', 'sl-9-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31876.61109334772!2d101.89626816734089!3d2.9373411630783925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdd1ef53d30043%3A0xef63171fa82df780!2sBroga%20Hill%20Park!5e0!3m2!1sen!2smy!4v1617982089862!5m2!1sen!2smy', 'st2'),
('att3', 'Perak Tong Cave Temple', 'PERAK', 'On the outskirts of Ipoh there are many fascinating cave temples to visit. One of the most famous is Perak Tong Cave Temple. The cave contains a 40 foot high golden Buddha and beautiful murals. Climb 450 steps for a great view of Ipoh.', 'After climbing the steps and passing through the narrow entrance passage, the limestone cave opens up into a giant space with a high dome and branching off into hidden recesses and grottoes.  A golden sitting Buddha statue, 40 feet tall, dominates the temple.The walls of the cavern are decorated with colourful murals depicting characters and events from Chinese mythology and Buddhist scriptures.  Chinese calligraphy also adorns the walls some of which was painted by the afore-mentioned Chong Yin Chat.  There are numerous statues and carvings scattered around the temple, including a female with 18 arms who could be Guan Yin, the Goddess of Mercy. The strong aroma of incense mixed with the earthy cave smell lends the cave a special atmosphere.', '50.32', '9am - 8pm', 5, 'Outdoors', 'relaxing, historic, shopping, wildlife, culture', 'pr-3.jpg', 'pr-3-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.71835365341!2d101.09718511405457!3d4.644244396626336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31ca9334036635e9%3A0xecbb5436ef386f94!2zUGVyYWsgQ2F2ZSBUZW1wbGUg6Zy56Zuz5rSe!5e0!3m2!1sen!2smy!4v1616511011960!5m2!1sen!2smy', 'st1'),
('att30', 'Malaysia Agriculture Park', 'SELANGOR', 'This is a huge nature park at Shah Alam with stacks of activities and exhibits. Although the park is in need of renovation in parts it is still a worthwhile visit for a day outdoors.', 'The park goes by many names. When it opened in 1986 it was known as Bukit Cerakah but usually referred to as Bukit Cahaya Seri Alam. Later the name was changed to Malaysia Agriculture Park (Taman Pertanian Malaysia in Bahasa). In 2011 it was renamed again as Taman Botani Negara Shah Alam which translates as National Botanical Garden Shah Alam.\r\n\r\nThe jungle vegetation, the trees and gardens are self-renewing and remain pristine. The air is clean. The only sounds are insects, laughing children and monkeys thrashing about in the treetops. And the park is huge - its 817 hectares (that\'s over 2000 acres) contain 422 different species of plants and trees acting as a conservation centre and laboratory for Malaysian plant life.', '200.00', '8.30am - 4.30pm', 7, 'Outdoors', 'historic, culture, relaxing, wildlife', 'sl-10.jpg', 'sl-10-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31871.95355957045!2d101.49370483955077!3d3.096201899999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc5215c40a6b0d%3A0xa10ddd525ebd9771!2sShah%20Alam%20National%20Botanical%20Park!5e0!3m2!1sen!2smy!4v1617982650564!5m2!1sen!2smy', 'st2'),
('att31', 'FRIM Canopy Walk', 'SELANGOR', 'Another giant nature reserve whose main attraction is its canopy walkway, a slightly wobbly pedestrian suspension bridge which provides a bird\'s eye view of the rainforest. This has to one of the top Selangor attractions.', 'Walking the FRIM Canopy Walk is a great way for adults and families to spend a day or half-day in the fresh air with plenty of exercise.\r\n\r\nFRIM, or the Forest Research Institute Malaysia, is located near Kepong on the northern outskirts of Kuala Lumpur not far from Batu Caves. In fact you can see both FRIM and Batu Caves on the same day if you are pressed for time and are feeling energetic.\r\n\r\nIf you have plenty of time however it is best not to rush your visit to FRIM as there is plenty to do and see there apart from the Canopy Walkway.\r\n\r\nFRIM is one of top tropical forestry research institutes in the world. It was established in 1929 on land which had already been stripped of its original forest cover. Trees replanted at that time are now well established (i.e. huge!).\r\n\r\nFRIM\'s campus sprawls over a massive 486 hectare site, most of which is accessible to the public, and is surrounded by the Bukit Lagong Forest Reserve.', '15.00', '9.30am - 6.30pm', 6, 'Outdoors', 'culture, relaxing, wildlife, historic', 'sl-11.jpg', 'sl-11-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.4588736872947!2d101.63062681475756!3d3.235403397644443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc468c74616a13%3A0x65754bb0c250fbcf!2sForest%20Research%20Institute%20Malaysia%20(FRIM)!5e0!3m2!1sen!2smy!4v1618047336610!5m2!1sen!2smy', 'st2'),
('att32', 'Raja Tun Uda Public Library', 'SELANGOR', 'This wonderful public library operated by Perbadanan Perpustakaan Awam Selangor (PPAS) is located on a hilltop next to the Sultan Abdul Aziz Shah Golf & Country Club. ', 'The library extends over six spacious floors enjoying fine views over the city. As well as a vast collection of physical books, every floor has numerous state-of-the-art Mac desktops  and plenty of desk space and comfortable seating for serious students and casual readers alike.', '0.00', '9am - 6pm', 3, 'Indoors', 'historic, culture, relaxing', 'sl-12.jpg', 'sl-12-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.020105919477!2d101.53100871475718!3d3.089305197750373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc528098b48b15%3A0x26cd97945cd42266!2sPustaka%20Raja%20Tun%20Uda%2C%20Perbadanan%20Perpustakaan%20Awam%20Selangor%20(PPAS)!5e0!3m2!1sen!2smy!4v1618047617435!5m2!1sen!2smy', 'st2'),
('att33', 'Sultan Alam Shah Museum', 'SELANGOR', 'This museum was opened in 1989 and acts as the state museum for Selangor. It provides useful background information on the geography, history, culture and natural history of Selangor. ', 'The museum’s building design is based on Minangkabau architecture; the Minangkabau is the world’s largest matrilineal society, where property, family name and land pass down from mother to daughter.Covering approximately 135,000 square feet, the museum has nearly 4,000 artifacts housed in five exhibition halls and a section for outdoor display.', '10.00', '9.30am - 5.30pm', 4, 'Indoors', 'historic, culture, relaxing', 'sl-13.jpg', 'sl-13-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.0754737195716!2d101.51876101475713!3d3.0745161977611195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc527e30bbfd93%3A0xecde0611157853f4!2sSultan%20Alam%20Shah%20Museum!5e0!3m2!1sen!2smy!4v1618047846895!5m2!1sen!2smy', 'st2'),
('att34', 'Shah Alam Gallery', 'SELANGOR', 'This gallery is located alongside the lake and contains a modest exhibition of paintings and artworks from local and foreign artists. The gallery is also often used as a wedding venue. ', 'The Shah Alam Gallery is an arts center and tourist destination in the Klang Valley located in the heart of Shah Alam city center. Its beautiful buildings with the delicate design of traditional Malay architecture surrounded by lakes and parks add to the beauty of the ‘art’ as well as a safe and comfortable atmosphere that will attract the public to visit the Shah Alam Gallery.', '10.00', '9am - 6pm', 4, 'Indoors', 'historic, culture, relaxing', 'sl-14.jpg', 'sl-14-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127490.53662674478!2d101.44505635820312!3d3.0734997000000037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc5287baba3967%3A0x3516b15bbb89e515!2sGaleri%20Shah%20Alam!5e0!3m2!1sen!2smy!4v1618048077531!5m2!1sen!2smy', 'st2'),
('att35', 'The Sultan Abdul Aziz Royal Gallery Klang', 'SELANGOR', 'The Galeri Diraja Sultan Abdul Aziz is one of the best museums In Malaysia. It highlights the rich heritage of the Selangor Sultanate and contains an excellent collection of artefacts and gifts, together with replicas of the Selangor crown jewels.', 'The museum was opened in 2007 by HRH Sultan Sharafuddin Idris Shah, the ninth Sultan of Selangor. It is dedicated to the memory of his late father, Sultan Salahuddin Abdul Aziz Shah.\r\n\r\nThe museum traces the history and family tree of the Selangor Sultanate from the days when they migrated to the Klang area in the 1700s from Sulawesi which was under Dutch control at the time\r\n\r\nThe gallery contains a great collection of the late Sultan’s personal artefacts, memorabilia and royal paraphernalia. The displays include day-to-day items (for a king!) like silver tea services and plates as well as a tea spoon collection, cameras, coins, medals, models, some superb krises (Malaysian daggers), replicas of Selangor’s crown jewels, uniforms, samurai helmets and various gifts from royals and dignitaries from around the world.', '15.00', '10am - 5pm', 3, 'Indoors', 'historic, culture, relaxing', 'sl-15.jpg', 'sl-15-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.198212339762!2d101.44703241475702!3d3.0414759977850574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc534e99680727%3A0x7b85c88dc35fe42e!2sSultan%20Abdul%20Aziz%20Royal%20Gallery!5e0!3m2!1sen!2smy!4v1618048464398!5m2!1sen!2smy', 'st2'),
('att36', 'Thian Hock Keong Snake Temple', 'SELANGOR', 'This interesting temple is decorated with numerous sculptures of snakes, coiled around columns, adorning the roof and even wrapped around the altar.', 'It is a Taoist temple and it looks fairly recent. There are a few real snakes inside the temple but thankfully they are safely caged, unlike the snake temple in Penang where they allowed to slither loose.', '5.00', '9am - 6pm', 2, 'Indoors', 'historic, culture, relaxing', 'sl-16.jpg', 'sl-16-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.165709853166!2d101.42534071475707!3d3.0502601977787074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc54a43cd6c5d9%3A0x74245f637038fa04!2z5be055Sf5aSp56aP5a6rIFRpYW4gSG9jayBLdW5n!5e0!3m2!1sen!2smy!4v1618048700545!5m2!1sen!2smy', 'st2'),
('att37', 'Wet World Shah Alam', 'SELANGOR', 'Also in the Lake Gardens is this water theme park. It was a fairly tame and inexpensive park.', 'Best suited to young children but they have since added new slides and rides such as the Super Hurricane and Monsoon Buster Adventure, claimed to be the longest water coaster in southeast Asia. ', '24.00', '10am - 6pm', 7, 'Indoors,Outdoors', 'culture, relaxing, romantic, shopping', 'sl-17.jpg', 'sl-17-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.0840192983683!2d101.51032671475713!3d3.0722272977627645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc52875f7f02c3%3A0xcee69a0bce98ec2e!2sWet%20World%20Water%20Parks%20Shah%20Alam!5e0!3m2!1sen!2smy!4v1618048963449!5m2!1sen!2smy', 'st2'),
('att38', 'Kuan Wellness Eco Park', 'SELANGOR', 'At Kuan Wellness Eco Park near Batu Laut kids can feed a variety of animals and learn about bird’s nest farming amid pleasant surroundings.', 'The owners of Kuan Wellness Eco Park are bird’s nest producers and they have opened up one of their swiftlet farm buildings near Pantai Batu Laut to the public to explain about bird’s nest production. Together with a visitor centre, shops selling bird’s nest and other health foods and a small zoo attraction they have created a pleasant place to bring the family while visiting other nearby sites in this corner of Selangor.', '8.00', '9am - 7pm', 5, 'Indoors,Outdoors', 'culture, relaxing, shopping, wildlife, romantic', 'sl-18.jpg', 'sl-18-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.4106617872058!2d101.4948535147563!3d2.693425898037743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb302b5908a89%3A0xaf9d53372c3a6da2!2sKuan%20Wellness%20Eco%20Park!5e0!3m2!1sen!2smy!4v1618049250394!5m2!1sen!2smy', 'st2'),
('att39', 'Gano Mushroom Farm Shop & Homestay', 'SELANGOR', 'This place has a number of displays describing various types of mushrooms, their health benefits, and method of cultivation. The mushrooms are not grown here but in a farm nearby. ', 'There is a large shop where visitors can stock up on fresh mushrooms, pickled and dried mushrooms, healthy mushroom-based drinks and other products at reasonable prices. They also run a homestay for people who want to spend more time in this relaxing town. The homestay is in the centre of town facing the sea and there is a wooden jetty behind the homestay where you can enjoy the sea breezes or watch the sunset.', '15.00', '9am - 6.30pm', 4, 'Indoors,Outdoors', 'culture, relaxing, shopping, wildlife, romantic', 'sl-19.jpg', 'sl-19-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63768.81388390948!2d101.55248473899539!3d2.650233505675724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cd93ff4aa99bd1%3A0xa024c016d901a742!2sGanofarm%20Mushroom%20Farm!5e0!3m2!1sen!2smy!4v1618049453982!5m2!1sen!2smy', 'st2'),
('att4', 'Batu Gajah Heritage Trail', 'PERAK', 'Batu Gajah is not nearly as famous as Ipoh but it also has a lot to offer lovers of heritage with many fine and interesting buildings surviving from the colonial era. With this map and information you can do a self-guided tour.', 'Its colourful history has left in its wake a trail of well-preserved architectural and historical markers, which until now have been spared the gadarene rush of Lonely Planet-toting tourists.  The upshot: Batu Gajah has plenty of nooks and crannies which can be particularly rewarding for the mature traveller who craves more than superficial eye candy: a sense of its past, a taste of the local lifestyle, and that increasingly rare animal - the offbeat discovery.  Any visit of BG should include a driving tour of its heritage trail at the Jalan Changkat colonial core, which can be easily covered in a day. A long strip of well-paved road winds through a leafy enclave that exudes the gentrified vibe of the colonial days. Must-sees are God’s Little Acre, Kinta Gaol and the High Court House, recently converted into a museum, and the Hospital District Batu Gajah.', '33.50', '6am - 10pm', 4, 'Indoors,Outdoors', 'relaxing, historic, romantic, shopping, wildlife, culture', 'pr-4.jpg', 'pr-4-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127290.49353117905!2d100.97613177211117!3d4.443106098462907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cae626f13d1ccd%3A0x2ae103ad27ec66f0!2sBatu%20Gajah%2C%20Perak!5e0!3m2!1sen!2smy!4v1616511268759!5m2!1sen!2smy', 'st1'),
('att40', 'Ostrich Wonderland', 'SELANGOR', 'At Ostrich Wonderland near Semenyih children can see exotic ostriches, geese and turkeys and ride ponies in a rural setting.', 'This attraction is owned by people in the commercial poultry business and the birds here are raised primarily for their meat but since they have a spacious compound they allow the public to come in to see their ostriches, geese, turkeys and guinea fowl.The ostriches roam freely in a large pen and seem well looked after.\r\n\r\nBesides birds there are goats, ponies, rabbits, donkeys and monkeys.\r\n\r\nYou can take a look at the egg incubators and get a briefing on raising exotic birds. You can buy frozen ostrich, chicken or guinea fowl meat to take home and maybe even a turkey for Christmas.\r\n\r\nThey also sell fruit items such as passion fruit and mulberries.\r\n\r\nA nice place to take the children.', '15.00', '9am - 6.30pm', 4, 'Indoors,Outdoors', 'culture, relaxing, shopping, wildlife', 'sl-20.jpg', 'sl-20-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.347227669076!2d101.87509381475701!3d3.0008738978145235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdcd700ccddd2f%3A0x4cb2404b855e98a7!2sOstrich%20Wonderland%20Semenyih!5e0!3m2!1sen!2smy!4v1618049953880!5m2!1sen!2smy', 'st2'),
('att5', 'The Leaning Tower of Teluk Intan', 'PERAK', 'The small Perak town of Teluk Intan contains Malaysia\'s answer to the Leaning Tower of Pisa. It is an old water tower disguised to look like a Chinese pagoda and it has a distinct incline due to subsidence.', 'The Teluk Intan Leaning Tower can be abbreviated as TILT and that is what it does!  This 25 meter high tower in the small Perak town of Teluk Intan is Malaysia\'s answer to the Leaning Tower of Pisa. It is not as old, nor as tall, nor as famous as its Italian counterpart but it does have a distinct incline and that makes a curiosity worth visiting.  It was constructed in 1885 by Mr. Leong Choon Cheong and some Ceylonese contractors. It was built primarily to store water for local usage during the dry season and in case of fire. Since it began leaning over due to soft soil foundations it has become a tourist attraction.  It is a 3 storey brick construction with a large steel water tank at the upper level. From the outside however it has been disguised to look like an 8 storey Chinese pagoda.  Local people contributed to buy the clock from James W. Benson, Turret Clock Makers of Ludgate Hill, London. It still works and chimes every 15 minutes.', '20.50', '10am - 10pm', 5, 'Indoors,Outdoors', 'relaxing, historic, romantic, shopping, culture', 'pr-5.jpg', 'pr-5-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.976797469875!2d101.01707291366489!3d4.0251450482679445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb1504ba043d4f%3A0x42ac164a6cf576!2sLeaning%20Tower%20of%20Teluk%20Intan!5e0!3m2!1sen!2smy!4v1616511367251!5m2!1sen!2smy', 'st1'),
('att6', 'Pasir Salak Historical Complex ', 'PERAK', 'This riverside compound has some attractive buildings and a museum commemorating the assassination of JWW Birch, the first British Resident of Perak.', 'Pasir Salak Historical Complex is a pleasant compound of traditional Malay buildings which together form a museum alongside the Perak River about 50 kilometres south of Ipoh.  Pasir Salak Historical Complex was officially opened to the public in 2004. Everything seems peaceful now but it was not always so for it was here that the first British Resident of Perak, Mr. J.W.W. Birch was assassinated in 1875.  Under the Pangkor Treaty signed in 1874, Perak was established as a British Protectorate and an advisor was appointed to the Sultan of Perak. This British advisor or Resident assumed complete control of Perak in all matters except those involving customs and religion.', '34.75', '10am - 9pm', 5, 'Outdoors', 'relaxing, historic, romantic, wildlife, culture', 'pr-6.jpg', 'pr-6-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.2390781037057!2d100.94468971476046!3d4.173345696965854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb22c3333933c9%3A0x1117333cd5a8aa79!2sPJ%20Alpha%20Ent!5e0!3m2!1sen!2smy!4v1616511609259!5m2!1sen!2smy', 'st1'),
('att7', 'Tanjung Tualang Tin Dredge', 'PERAK', 'Close to the town of Batu Gajah in Perak there is a surviving tin dredge, a colossal industrial relic from the days when Malaysia was the world’s largest tin producer.', 'Tanjung Tualang Tin Dredge is a unique relic from Malaysia’s tin mining heydays.   A tin dredge is like a floating factory. This one, named Tanjung Tualang Dredge No. 5, or TT5,  weighs 4,500 tons and is supported by a pontoon of 75 meters in length, 35 meters in width and 3 meters in depth. It was built in England in 1938 by F.W.Payne & Son which, at that time, was a major design engineering company in bucketline dredges.  Tin dredges work by scooping up bucket loads of tin-bearing soil at the front end, which then passes through an oscillating drum and a system of jigs and screens to extract the tin, before spewing out the waste material at the rear end through a number of chutes.  This dredge was built for the Southern Malayan Tin Dredging Ltd, a company formed in 1926 which operated a further 5 dredges  in the Batu Gajah and Tanjung Tualang area. TT5 was in operation for 44 years until 1982 by which time the Malaysian tin industry was in rapid decline due to a combination of exhausted tin deposits, low tin prices and high operating costs.  After1982 the dredge fell on hard times. All the other dredges in the area were disposed of long ago and this last remaining example was in danger of being of being sold off for its high scrap metal value until heritage-loving individuals launched a “Save the Dredge” campaign.', '15.99', '8am - 9pm', 3, 'Outdoors', 'relaxing, historic, relaxing', 'pr-7.jpg', 'pr-7-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.077755277187!2d101.05053201476119!3d4.3965510968048065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cae14b4f498d27%3A0xa68bac5509a837e9!2sTanjung%20Tualang%20Tin%20Dredge%20No.%205!5e0!3m2!1sen!2smy!4v1616511711900!5m2!1sen!2smy', 'st1');
INSERT INTO `attraction` (`attID`, `attName`, `location`, `descp`, `long_descp`, `cost`, `opHr`, `rcmDur`, `category`, `tags`, `imgName`, `img2Name`, `map_url`, `stateID`) VALUES
('att8', 'Lost World of Tambun', 'PERAK', 'This is an international standard theme park in a beautiful setting near Ipoh. In addition to slides, pools and other water-based attractions, the park has a mini zoo and hot springs.', 'Lost World is mostly a water theme park and there are the usual attractions such as a lazy river (Adventure River), the Jungle Wave Pool (Malaysia\'s biggest, although it seemed to be waveless on the day of our visit) with an extensive sandy beach, and a couple of giant water slides (the sort where you have to sit on inflatable rubber rings) called Cliff Racer and Tube Raiders. There is also a pool play area for younger kids - Kids Explorabay. A unique feature of Lost World of Tambun is the hot spring and there are a number of pools, jacuzzis and a steam cave where you can enjoy the health-giving benefits of natural hot mineral spring water. The water temperature in most of these pools exceeds 40 degrees centigrade which we found rather too hot seeing that it was a sweltering sunny day. The hot springs are open for evening sessions from 6pm - 11pm when the air temperature cools down a bit so perhaps that is the best time to appreciate the hot springs. Attached to the hot springs are massage facilities (Crystal Spa) where you can complete the full spa experience.', '45.00', '9am - 9pm', 6, 'Outdoors', 'relaxing, shopping, wildlife, culture', 'pr-8.jpg', 'pr-8-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.8275331833092!2d101.15244131476206!3d4.624839996640308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31caf2a9aa7d9ded%3A0xd3f798d23d7a8d8c!2sSunway%20Lost%20World%20Of%20Tambun%20%3A%20Lost%20World%20Hotel%20and%20Lost%20World%20of%20Tambun%20Theme%20Park!5e0!3m2!1sen!2smy!4v1616511940024!5m2!1sen!2smy', 'st1'),
('att9', 'Kellie\'s Castle', 'PERAK', 'This historic half-built palatial home for a Scottish planter is one of the top Perak attractions. You can find out about its sad history and the legends that go with it. ', 'No plans showing Kellie Smith\'s design for the house have survived but on a recent Discovery Channel documentary a Malaysian architect Mr.Chen Voon Fee speculates how Kellie\'s Castle might have looked if it had ever been finished, based on what survives today and old photos of the Kellas House before it was substantially destroyed by Japanese bombing during their WWII occupation. It really would have been a splendid building and among the finest homes in Malaya. The design incorporates features similar to those found in Kuala Lumpur\'s Sultan Abdul Samad and High Court buildings with moghul horseshoe arches over doorways and windows, copper onion domes and ornate neo-classical friezes.', '30.00', '8am - 6.30pm', 5, 'Outdoors', 'relaxing, historic, romantic, shopping, wildlife, culture', 'pr-9.jpg', 'pr-9-1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.6587586774663!2d101.08561631476148!3d4.474354496748723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31caef5e78817aa9%3A0x93bc5c7d6ecd82ba!2sKellie&#39;s%20Castle!5e0!3m2!1sen!2smy!4v1616512069571!5m2!1sen!2smy', 'st1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmtID` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `userID` varchar(255) COLLATE utf8_bin NOT NULL,
  `frmID` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmtID`, `comment`, `date`, `userID`, `frmID`) VALUES
('cmt1', 'Perak has many good relaxing spots such as Ipoh Heritage Walk, Kellies Castle and Maxwell Hill.', '2021-04-03', 'jake0930', 'frm2'),
('cmt10', 'The Museum is the best one I have tasted so far, strongly recommend', '2021-04-23', 'JackS0316', 'frm3'),
('cmt11', 'I have stayed in Peanut Butter Homestay before, they are ok but the price is reasonable, so there is that', '2021-04-23', 'JackS0316', 'frm4'),
('cmt12', 'Exactly! I love visiting Selangor especially with my family, there are a lot of fun things to do and place to visit', '2021-04-26', 'stvh0726', 'frm7'),
('cmt13', 'I agree. It is a fun place to visit', '2021-04-28', 'CheeYung99', 'frm7'),
('cmt2', 'WEIL Hotel is one of the best hotels in Ipoh. Strongly recommended.', '2021-04-07', 'jake0930', 'frm1'),
('cmt3', 'Pulau Pangkor is a good place for good relaxation!', '2021-04-23', 'MarryJ0513', 'frm2'),
('cmt4', 'I agree. Me and my family visited there last year, it costed us over MYR 200', '2021-04-23', 'MarryJ0513', 'frm6'),
('cmt5', 'They should reduce the price for adult and children especially if you are local', '2021-04-23', 'abc123', 'frm6'),
('cmt6', 'It is great, we had a fun time there last month too', '2021-04-23', 'abc123', 'frm5'),
('cmt7', 'I will never visit that theme park ever again!', '2021-04-23', 'jake0930', 'frm6'),
('cmt8', 'Eminent Suite is a good choice, me and my family find it very clean and tidy', '2021-04-23', 'jake0930', 'frm4'),
('cmt9', 'Restaurant Maharaj Ipoh is the best choice, they serve good food and the price is also reasonable', '2021-04-23', 'jake0930', 'frm3');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `comID` varchar(255) COLLATE utf8_bin NOT NULL,
  `planID` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`comID`, `planID`) VALUES
('com1', 'abc123_pl675'),
('com10', 'Jason9327_pl507'),
('com11', 'jake0930_pl240'),
('com12', 'jake0930_pl576'),
('com13', 'MarryJ0513_pl462'),
('com14', 'MarryJ0513_pl377'),
('com15', 'abc123_pl587'),
('com16', 'jake0930_pl495'),
('com17', 'CheeYung99_pl758'),
('com2', 'jake0930_pl272'),
('com3', 'MarryJ0513_pl487'),
('com4', 'MarryJ0513_pl807'),
('com5', 'MarryJ0513_pl762'),
('com6', 'stvh0726_pl830'),
('com7', 'stvh0726_pl591'),
('com8', 'abc123_pl744'),
('com9', 'Jason9327_pl540');

-- --------------------------------------------------------

--
-- Table structure for table `community_vote`
--

CREATE TABLE `community_vote` (
  `userID` varchar(255) COLLATE utf8_bin NOT NULL,
  `comID` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `frmID` varchar(255) COLLATE utf8_bin NOT NULL,
  `title` mediumtext COLLATE utf8_bin NOT NULL,
  `content` mediumtext COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `userID` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`frmID`, `title`, `content`, `date`, `userID`) VALUES
('frm1', 'Good hotel near Ipoh?', 'Looking for at least 4 star hotel in Ipoh or near Ipoh.', '2021-04-07', 'stvh0726'),
('frm2', 'Looking for relaxing spots in Perak', 'I am looking for good relaxing spots in Perak, any recommendations?', '2021-04-02', 'abc123'),
('frm3', 'Looking for restaurant near Ipoh', 'I am looking for restaurant that serves local Malaysia cuisine. Any recommendations?', '2021-04-07', 'stvh0726'),
('frm4', 'Looking for homestay in Selangor', 'My family and I are travelling to Selangor this weekend, any good homestay suggestions?', '2021-04-23', 'MarryJ0513'),
('frm5', 'Zoo Negara in Selangor is amazing', 'I have just visited Zoo Negara with my family and that place is amazing! We had a great time!', '2021-04-23', 'JackS0316'),
('frm6', 'Sunway Lagoon ticket is too expensive', 'As the title says, the ticket for adult and children is just too expensive even if you are Malaysian. They should do something about it.', '2021-04-23', 'JackS0316'),
('frm7', 'Selangor is a fun and attractive state to visit!', 'I like how Selangor people is so warm and welcoming, they always smile to the travelers! This place is a must to visit!', '2021-04-26', 'Jason9327'),
('frm8', 'Is there any good place in Perak that I can visit with my family?', 'I am planning to visit perak this weekend with my family, any good places to visit?', '2021-04-28', 'CheeYung99');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `planID` varchar(255) COLLATE utf8_bin NOT NULL,
  `location` varchar(255) COLLATE utf8_bin NOT NULL,
  `planName` varchar(255) COLLATE utf8_bin NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `dups` varchar(255) COLLATE utf8_bin NOT NULL,
  `pay` varchar(255) COLLATE utf8_bin NOT NULL,
  `userID` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`planID`, `location`, `planName`, `startDate`, `endDate`, `dups`, `pay`, `userID`) VALUES
('CheeYung99_pl534', 'SELANGOR', 'With Friends', '2021-05-01', '2021-05-03', 'N', 'N', 'CheeYung99'),
('CheeYung99_pl654', 'PERAK', 'Shopping Weekend', '2021-12-01', '2021-12-02', 'Y', 'N', 'CheeYung99'),
('CheeYung99_pl758', 'PERAK', 'Yap Family', '2021-04-06', '2021-04-09', 'N', 'Y', 'CheeYung99'),
('Jason9327_pl507', 'SELANGOR', 'Shopping With Friends', '2021-09-01', '2021-09-04', 'N', 'N', 'Jason9327'),
('Jason9327_pl540', 'PERAK', 'Shopping Weekend', '2021-07-03', '2021-07-04', 'N', 'N', 'Jason9327'),
('MarryJ0513_pl377', 'PERAK', 'Alone Trip', '2021-12-01', '2021-12-03', 'N', 'N', 'MarryJ0513'),
('MarryJ0513_pl462', 'SELANGOR', 'Bestie Trip', '2021-12-30', '2022-01-02', 'N', 'N', 'MarryJ0513'),
('MarryJ0513_pl487', 'SELANGOR', 'Chill N Fun', '2022-03-01', '2022-03-04', 'N', 'N', 'MarryJ0513'),
('MarryJ0513_pl762', 'PERAK', 'Animal Trip', '2021-12-24', '2021-12-26', 'N', 'N', 'MarryJ0513'),
('MarryJ0513_pl807', 'PERAK', 'Simple N Relaxing', '2021-08-16', '2021-08-18', 'N', 'N', 'MarryJ0513'),
('abc123_pl506', 'PERAK', 'Family Trip', '2021-06-01', '2021-06-04', 'N', 'N', 'abc123'),
('abc123_pl587', 'SELANGOR', 'With Wife', '2022-05-01', '2022-05-03', 'N', 'N', 'abc123'),
('abc123_pl675', 'PERAK', 'Weekend Getaway', '2021-04-23', '2021-04-25', 'N', 'Y', 'abc123'),
('abc123_pl744', 'PERAK', 'With Friends', '2021-04-27', '2021-04-30', 'Y', 'N', 'abc123'),
('jake0930_pl240', 'SELANGOR', 'With Buddy', '2021-12-01', '2021-12-04', 'N', 'N', 'jake0930'),
('jake0930_pl272', 'SELANGOR', 'Solo Trip', '2021-05-31', '2021-06-01', 'N', 'N', 'jake0930'),
('jake0930_pl495', 'PERAK', 'Fun Trip', '2022-12-01', '2022-12-02', 'N', 'N', 'jake0930'),
('jake0930_pl511', 'PERAK', 'Couple Trip', '2022-01-01', '2022-01-03', 'N', 'N', 'jake0930'),
('jake0930_pl576', 'SELANGOR', 'Culture Trip', '2022-05-01', '2022-05-03', 'N', 'N', 'jake0930'),
('stvh0726_pl270', 'SELANGOR', 'With Family', '2021-12-23', '2021-12-26', 'N', 'N', 'stvh0726'),
('stvh0726_pl591', 'PERAK', 'Honeymoon', '2022-05-01', '2022-05-04', 'N', 'N', 'stvh0726'),
('stvh0726_pl830', 'SELANGOR', 'With Besties', '2021-09-01', '2021-09-04', 'N', 'N', 'stvh0726');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` mediumtext COLLATE utf8_bin NOT NULL,
  `rating` int(11) NOT NULL,
  `rwDate` date NOT NULL,
  `attID` varchar(255) COLLATE utf8_bin NOT NULL,
  `userID` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewID`, `content`, `rating`, `rwDate`, `attID`, `userID`) VALUES
('rw1', 'This place is awesome!', 3, '2021-04-23', 'att13', 'abc123'),
('rw2', 'Banding Island is a good place to visit, I recommend everyone else to visit', 4, '2021-04-28', 'att12', 'CheeYung99');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateID` varchar(255) COLLATE utf8_bin NOT NULL,
  `stateName` varchar(255) COLLATE utf8_bin NOT NULL,
  `descp` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateID`, `stateName`, `descp`) VALUES
('st1', 'PERAK', 'Perak is a state in the northwest of Peninsular Malaysia. The capital city Ipoh is known for its British colonial landmarks, including a baroque railway station. Sam Poh Tong is a huge Buddhist cave temple filled with wall paintings. The town of Gopeng isPerak is a state in the northwest of Peninsular Malaysia. The capital city Ipoh is known for its British colonial landmarks, including a baroque railway station. Sam Poh Tong is a huge Buddhist cave temple filled with wall paintings. The town of Gopeng is a base for rafting on the Kampar river. Off the west coast, the resort island of Pulau Pangkor has forested hills and the ruins of a 17th-century Dutch fort.'),
('st2', 'SELANGOR', 'Selangor also known by its Arabic honorific Darul Ehsan, or \"Abode of Sincerity\", is one of the 13 states of Malaysia. The state capital of Selangor is Shah Alam and its royal capital is Klang.');

-- --------------------------------------------------------

--
-- Table structure for table `temp_up`
--

CREATE TABLE `temp_up` (
  `tempID` varchar(255) COLLATE utf8_bin NOT NULL,
  `planID` varchar(255) COLLATE utf8_bin NOT NULL,
  `attID` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(255) COLLATE utf8_bin NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `firstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `firstName`, `lastName`, `email`) VALUES
('CheeYung99', 'CY', '1234567a', 'Chee Yung', 'Yap', 'yapcheeyung@gmail.com'),
('JackS0316', 'Jackson0316', 'JackS0316', 'Jackson', 'Darude', 'Jackson0316@gmail.com'),
('Jason9327', 'Jason_W', 'JasonW9327', 'Jason', 'Wick', 'Jason_W6@gmail.com'),
('MarryJ0513', 'MarrJ', 'MarryJ0513:]', 'Marry', 'Jane', 'MarryJ0513@gmail.com'),
('abc123', 'Paul0123', '123abc', 'Paul', 'Henry', 'jackson0123@gmail.com'),
('jake0930', 'Jake_S', '12345678', 'Jake', 'Steve', 'jake@gmail.com'),
('stvh0726', 'SteveH0726', 'abc123', 'Steve', 'Henry', 'SteveH0726@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `planID` varchar(255) COLLATE utf8_bin NOT NULL,
  `attID` varchar(255) COLLATE utf8_bin NOT NULL,
  `modDur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`planID`, `attID`, `modDur`) VALUES
('CheeYung99_pl534', 'att1', 0),
('CheeYung99_pl534', 'att11', 0),
('CheeYung99_pl534', 'att12', 0),
('CheeYung99_pl534', 'att16', 0),
('CheeYung99_pl534', 'att19', 0),
('CheeYung99_pl534', 'att28', 0),
('CheeYung99_pl534', 'att31', 0),
('CheeYung99_pl534', 'att4', 0),
('CheeYung99_pl534', 'att40', 0),
('CheeYung99_pl654', 'att19', 3),
('CheeYung99_pl654', 'att2', 3),
('CheeYung99_pl654', 'att25', 0),
('CheeYung99_pl654', 'att39', 2),
('CheeYung99_pl654', 'att9', 0),
('CheeYung99_pl758', 'att14', 3),
('CheeYung99_pl758', 'att17', 0),
('CheeYung99_pl758', 'att22', 0),
('CheeYung99_pl758', 'att23', 0),
('CheeYung99_pl758', 'att25', 0),
('CheeYung99_pl758', 'att27', 0),
('CheeYung99_pl758', 'att28', 0),
('CheeYung99_pl758', 'att3', 0),
('CheeYung99_pl758', 'att31', 0),
('CheeYung99_pl758', 'att35', 0),
('CheeYung99_pl758', 'att38', 0),
('CheeYung99_pl758', 'att40', 0),
('CheeYung99_pl758', 'att6', 0),
('CheeYung99_pl758', 'att7', 2),
('CheeYung99_pl758', 'att8', 0),
('Jason9327_pl507', 'att12', 0),
('Jason9327_pl507', 'att17', 1),
('Jason9327_pl507', 'att18', 2),
('Jason9327_pl507', 'att20', 3),
('Jason9327_pl507', 'att21', 0),
('Jason9327_pl507', 'att22', 0),
('Jason9327_pl507', 'att27', 4),
('Jason9327_pl507', 'att28', 0),
('Jason9327_pl507', 'att30', 5),
('Jason9327_pl507', 'att31', 4),
('Jason9327_pl507', 'att32', 0),
('Jason9327_pl507', 'att33', 0),
('Jason9327_pl507', 'att35', 0),
('Jason9327_pl507', 'att6', 4),
('Jason9327_pl507', 'att8', 0),
('Jason9327_pl540', 'att19', 3),
('Jason9327_pl540', 'att2', 5),
('Jason9327_pl540', 'att25', 0),
('Jason9327_pl540', 'att36', 0),
('Jason9327_pl540', 'att39', 2),
('MarryJ0513_pl377', 'att1', 0),
('MarryJ0513_pl377', 'att14', 0),
('MarryJ0513_pl377', 'att20', 0),
('MarryJ0513_pl377', 'att21', 0),
('MarryJ0513_pl377', 'att25', 0),
('MarryJ0513_pl377', 'att28', 0),
('MarryJ0513_pl377', 'att29', 0),
('MarryJ0513_pl377', 'att3', 0),
('MarryJ0513_pl377', 'att4', 0),
('MarryJ0513_pl462', 'att12', 0),
('MarryJ0513_pl462', 'att13', 0),
('MarryJ0513_pl462', 'att2', 0),
('MarryJ0513_pl462', 'att22', 0),
('MarryJ0513_pl462', 'att25', 0),
('MarryJ0513_pl462', 'att26', 0),
('MarryJ0513_pl462', 'att28', 0),
('MarryJ0513_pl462', 'att29', 0),
('MarryJ0513_pl462', 'att3', 0),
('MarryJ0513_pl462', 'att30', 0),
('MarryJ0513_pl462', 'att38', 0),
('MarryJ0513_pl462', 'att39', 0),
('MarryJ0513_pl462', 'att9', 0),
('MarryJ0513_pl487', 'att22', 0),
('MarryJ0513_pl487', 'att23', 0),
('MarryJ0513_pl487', 'att26', 5),
('MarryJ0513_pl487', 'att27', 0),
('MarryJ0513_pl487', 'att28', 5),
('MarryJ0513_pl487', 'att29', 0),
('MarryJ0513_pl487', 'att30', 0),
('MarryJ0513_pl487', 'att31', 0),
('MarryJ0513_pl487', 'att38', 0),
('MarryJ0513_pl487', 'att39', 2),
('MarryJ0513_pl487', 'att40', 5),
('MarryJ0513_pl762', 'att1', 0),
('MarryJ0513_pl762', 'att11', 6),
('MarryJ0513_pl762', 'att17', 0),
('MarryJ0513_pl762', 'att26', 0),
('MarryJ0513_pl762', 'att28', 4),
('MarryJ0513_pl762', 'att3', 2),
('MarryJ0513_pl762', 'att31', 0),
('MarryJ0513_pl762', 'att40', 0),
('MarryJ0513_pl762', 'att8', 0),
('MarryJ0513_pl807', 'att10', 0),
('MarryJ0513_pl807', 'att13', 0),
('MarryJ0513_pl807', 'att16', 0),
('MarryJ0513_pl807', 'att17', 0),
('MarryJ0513_pl807', 'att24', 0),
('MarryJ0513_pl807', 'att26', 0),
('MarryJ0513_pl807', 'att29', 0),
('MarryJ0513_pl807', 'att31', 0),
('MarryJ0513_pl807', 'att32', 0),
('MarryJ0513_pl807', 'att35', 0),
('abc123_pl506', 'att1', 0),
('abc123_pl506', 'att10', 0),
('abc123_pl506', 'att14', 3),
('abc123_pl506', 'att16', 0),
('abc123_pl506', 'att18', 0),
('abc123_pl506', 'att21', 0),
('abc123_pl506', 'att24', 0),
('abc123_pl506', 'att26', 5),
('abc123_pl506', 'att28', 0),
('abc123_pl506', 'att29', 0),
('abc123_pl506', 'att35', 0),
('abc123_pl506', 'att36', 0),
('abc123_pl506', 'att38', 4),
('abc123_pl506', 'att4', 0),
('abc123_pl506', 'att7', 0),
('abc123_pl506', 'att9', 3),
('abc123_pl587', 'att15', 0),
('abc123_pl587', 'att18', 0),
('abc123_pl587', 'att21', 0),
('abc123_pl587', 'att28', 0),
('abc123_pl587', 'att35', 0),
('abc123_pl587', 'att36', 0),
('abc123_pl587', 'att38', 0),
('abc123_pl587', 'att4', 0),
('abc123_pl587', 'att6', 0),
('abc123_pl587', 'att7', 0),
('abc123_pl587', 'att9', 0),
('abc123_pl675', 'att12', 0),
('abc123_pl675', 'att13', 0),
('abc123_pl675', 'att17', 0),
('abc123_pl675', 'att19', 0),
('abc123_pl675', 'att2', 0),
('abc123_pl675', 'att30', 0),
('abc123_pl675', 'att33', 0),
('abc123_pl675', 'att34', 0),
('abc123_pl675', 'att4', 0),
('abc123_pl675', 'att5', 0),
('abc123_pl744', 'att12', 6),
('abc123_pl744', 'att13', 4),
('abc123_pl744', 'att17', 0),
('abc123_pl744', 'att19', 3),
('abc123_pl744', 'att2', 0),
('abc123_pl744', 'att30', 6),
('abc123_pl744', 'att33', 0),
('abc123_pl744', 'att34', 0),
('abc123_pl744', 'att4', 0),
('abc123_pl744', 'att5', 0),
('jake0930_pl240', 'att1', 3),
('jake0930_pl240', 'att13', 2),
('jake0930_pl240', 'att16', 5),
('jake0930_pl240', 'att17', 2),
('jake0930_pl240', 'att18', 0),
('jake0930_pl240', 'att19', 0),
('jake0930_pl240', 'att20', 0),
('jake0930_pl240', 'att21', 0),
('jake0930_pl240', 'att22', 0),
('jake0930_pl240', 'att25', 7),
('jake0930_pl240', 'att26', 5),
('jake0930_pl240', 'att32', 0),
('jake0930_pl240', 'att4', 0),
('jake0930_pl240', 'att8', 0),
('jake0930_pl240', 'att9', 3),
('jake0930_pl272', 'att1', 0),
('jake0930_pl272', 'att13', 0),
('jake0930_pl272', 'att23', 0),
('jake0930_pl272', 'att27', 0),
('jake0930_pl495', 'att10', 0),
('jake0930_pl495', 'att25', 0),
('jake0930_pl495', 'att26', 0),
('jake0930_pl495', 'att5', 0),
('jake0930_pl511', 'att1', 0),
('jake0930_pl511', 'att10', 3),
('jake0930_pl511', 'att13', 0),
('jake0930_pl511', 'att19', 0),
('jake0930_pl511', 'att2', 0),
('jake0930_pl511', 'att22', 0),
('jake0930_pl511', 'att29', 0),
('jake0930_pl511', 'att4', 0),
('jake0930_pl576', 'att1', 0),
('jake0930_pl576', 'att21', 0),
('jake0930_pl576', 'att25', 0),
('jake0930_pl576', 'att26', 0),
('jake0930_pl576', 'att27', 0),
('jake0930_pl576', 'att37', 0),
('jake0930_pl576', 'att5', 0),
('jake0930_pl576', 'att8', 0),
('stvh0726_pl270', 'att11', 0),
('stvh0726_pl270', 'att12', 0),
('stvh0726_pl270', 'att15', 0),
('stvh0726_pl270', 'att17', 0),
('stvh0726_pl270', 'att18', 0),
('stvh0726_pl270', 'att19', 0),
('stvh0726_pl270', 'att2', 0),
('stvh0726_pl270', 'att22', 0),
('stvh0726_pl270', 'att24', 0),
('stvh0726_pl270', 'att28', 0),
('stvh0726_pl270', 'att29', 0),
('stvh0726_pl270', 'att30', 0),
('stvh0726_pl270', 'att38', 0),
('stvh0726_pl270', 'att4', 0),
('stvh0726_pl270', 'att6', 0),
('stvh0726_pl591', 'att1', 5),
('stvh0726_pl591', 'att10', 3),
('stvh0726_pl591', 'att11', 0),
('stvh0726_pl591', 'att12', 6),
('stvh0726_pl591', 'att13', 0),
('stvh0726_pl591', 'att16', 0),
('stvh0726_pl591', 'att19', 0),
('stvh0726_pl591', 'att20', 0),
('stvh0726_pl591', 'att3', 2),
('stvh0726_pl591', 'att4', 0),
('stvh0726_pl591', 'att6', 0),
('stvh0726_pl591', 'att7', 0),
('stvh0726_pl591', 'att8', 7),
('stvh0726_pl591', 'att9', 3),
('stvh0726_pl830', 'att21', 5),
('stvh0726_pl830', 'att22', 0),
('stvh0726_pl830', 'att23', 5),
('stvh0726_pl830', 'att24', 0),
('stvh0726_pl830', 'att25', 0),
('stvh0726_pl830', 'att27', 0),
('stvh0726_pl830', 'att28', 7),
('stvh0726_pl830', 'att29', 0),
('stvh0726_pl830', 'att30', 0),
('stvh0726_pl830', 'att37', 0),
('stvh0726_pl830', 'att38', 4),
('stvh0726_pl830', 'att39', 0),
('stvh0726_pl830', 'att40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `attraction`
--
ALTER TABLE `attraction`
  ADD PRIMARY KEY (`attID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmtID`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`comID`);

--
-- Indexes for table `community_vote`
--
ALTER TABLE `community_vote`
  ADD PRIMARY KEY (`userID`,`comID`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`frmID`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateID`);

--
-- Indexes for table `temp_up`
--
ALTER TABLE `temp_up`
  ADD PRIMARY KEY (`tempID`,`planID`,`attID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`planID`,`attID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
