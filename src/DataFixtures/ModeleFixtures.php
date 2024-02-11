<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager; // Corrected namespace
use App\Entity\Modele;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ModeleFixtures extends Fixture implements DependentFixtureInterface
{
  private $counter = 1;
  private $i = 1;
  private $j = 1;
  private $k = 1;
  public function load(ObjectManager $manager)
  {
    $modelsByMarque = [
      'Abarth' => ['124', '124 Spider', '500', '595', '695', 'Grande Punto', 'Inny'],
      'Acura' => ['CL', 'CSX', 'EL', 'ILX', 'Integra', 'Legend', 'MDX', 'NSX', 'RDX', 'RL', 'RLX', 'ESX', 'TL', 'TLX', 'TSX', 'Vigor', 'ZDX'],
      'Aixam' => ['City', 'Coupé', 'Crossline', 'Crossover', 'D-Truck', 'e-Truck', 'Miniauto', 'Roadline', 'Scouty R', 'Série A'],
      'Alfa Romeo' => ['145', '146', '147', '155', '156', '159', '164', '166', '33', '4C', '75', '90', 'Alfasud', 'Alfetta', 'Brera', 'Crosswagon', 'Giulia', 'Giulietta', 'GT', 'GTV', 'Mito', 'Spider', 'Sprint', 'Stelvio', 'Tonale'],
      'Aro' => ['Série 10', 'Série 240', 'Série IMS', 'Spartana'],
      'Aston Martin' => ['AMV8', 'Bulldog', 'Cygnet', 'DB11', 'DB4', 'DB5', 'DB6', 'DB7', 'DB9', 'DBS', 'DBX', 'Legonda', 'One-77', 'Rapide', 'V12 Vantage', 'V8 Vantage', 'Vanquish', 'Virage', 'Volante', 'Zagato'],
      'Audi' => ['100', '200', '80', '90', 'A1', 'A2', 'A3', 'A4', 'A4 Allroad', 'A5', 'A6', 'A6 Allroad', 'A7', 'A8', 'Q2', 'Q3', 'Q4', 'Q5', 'Q7', 'Q8', 'Quattro', 'R8', 'RS Q3', 'RS Q8', 'RS2', 'RS3', 'RS4', 'RS5', 'RS6', 'RS7', 'S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'SQ2', 'SQ5', 'SQ7', 'SQ8', 'TT', 'TT RS', 'TT S', 'V8'],
      'Austin' => ['Allegro', 'Ambasador', 'Maestro', 'Maxi', 'Metro', 'Mini', 'Montego', 'Princess'],
      'Baic' => ['X35', 'X55'],
      'Bentley' => ['Arnage', 'Azure', 'Bentayga', 'Brooklands', 'Continental', 'Eight', 'Flying Spur', 'Mulliner', 'Mulsanne', 'Turbo'],
      'BMW' => ['Alpina', 'i3', 'i4', 'i7', 'i8', 'iX', 'iX1', 'iX3', 'M1', 'M2', 'M3', 'M4', 'M5', 'M6', 'M7', 'M8', 'Série 1', 'Série 2', 'Série 3', 'Série 4', 'Série 5', 'Série 6', 'Série 7', 'Série 8', 'X1', 'X2', 'X3', 'X3 M', 'X4', 'X4 M', 'X5', 'X5 M', 'X6', 'X6 M', 'X7', 'XM', 'Z1', 'Z3', 'Z3 M', 'Z4', 'Z4 M', 'Z8'],
      'Bugatti' => ['Chiron', 'EB 110', 'Veyron'],
      'Buick' => ['Centurion', 'Century', 'Electra', 'Enclave', 'La Crosse', 'Le Sabre', 'Lucerne', 'Park Avenue', 'Reatta', 'Regal', 'Rendezvous', 'Riviera', 'Roadmaster', 'Skyhawk', 'Skylark'],
      'Byd' => ['Atto', 'Dolphin', 'Han', 'Seal', 'Tang'],
      'Cadillac' => ['Allante', 'ATS', 'BLS', 'Brougham', 'Cimarron', 'CT5', 'CT6', 'CTS', 'Deville', 'DTS', 'Eldorado', 'Escalade', 'Fleetwood', 'Seville', 'SRX', 'STS', 'XLR', 'XT4', 'XT5', 'XT6', 'XTS'],
      'Chatenet' => ['Barooder', 'CH26', 'CH28', 'CH30', 'CH32', 'CH39', 'CH40', 'CH46', 'Speedino'],
      'Chevrolet' => ['2500', 'Alero', 'Astro', 'Avalanche', 'Aveo', 'Beretta', 'Blazer', 'Camaro', 'Caprice', 'Captiva', 'Cavalier', 'Chevelle', 'Chevy Van', 'Colorado', 'Corsica', 'Corvette', 'Cruze', 'El Camino', 'Epica', 'Equinox', 'Evanda', 'Express', 'G', 'HHR', 'Impala', 'Kalos', 'Lacetti', 'Lumina', 'Malibu', 'Matiz', 'Nubira', 'Orlando', 'Rezzo', 'S-10', 'Silverado', 'Spark', 'Spectrum', 'SSR', 'Suburban', 'Tacuma', 'Tahoe', 'Trailblazer', 'Trans Sport', 'Traverse', 'Trax', 'Venture', 'Volt'],
      'Chrysler' => ['300C', '300M', 'Aspen', 'Caravan', 'Concorde', 'Crossfire', 'Daytona', 'ES', 'Grand Voyager', 'GS', 'GTS', 'Le Baron', 'LHS', 'Neon', 'New Yorker', 'Pacifica', 'Prowler', 'PT Cruiser', 'Saratoga', 'Serbring', 'Stratus', 'Town & Country', 'Valiant', 'Viper', 'Vision', 'Voyager'],
      'Citroën' => ['2 CV', 'AX', 'Axel', 'Berlingo', 'BX', 'C-Crosser', 'C-Elysée', 'C-Zero', 'C1', 'C2', 'C3', 'C3 Aircross', 'C3 Picasso', 'C3 Pluriel', 'C4', 'C4 Aircross', 'C4 Cactus', 'C4 Grand Picasso', 'C4 Grand Space Tourer', 'C4 Picasso', 'C4 Space Tourer', 'C4X', 'C5', 'C5 Aircross', 'C6', 'C8', 'Cactus', 'CX', 'DS', 'DS3', 'DS4', 'DS5', 'DS7', 'Evasion', 'GSA', 'Jumper', 'Jumpy', 'Nemo', 'Saxo', 'SM', 'Spacetourer', 'eSpacetourer', 'Visa', 'Xantia', 'XM', 'Xsara', 'Xsara Picasso', 'ZX'],
      'Comarth' => ['CR', 'S1'],
      'Cupra' => ['Ateca', 'Born', 'Formentor', 'Leon'],
      'Dacia' => ['1100', '1300', '1310', '1400', '1410', 'Dokker', 'Duster', 'Jogger', 'Lodgy', 'Logan', 'Logan Stepway', 'Logan Van', 'Nova', 'Pick Up', 'Sandero', 'Sandero Stepway', 'Solenza', 'Spring', 'Super Nova'],
      'Daewoo' => ['Chairman', 'Cielo', 'Espero', 'Evanda', 'Kalos', 'Korando', 'Lacetti', 'Lanos', 'Leganza', 'Matiz', 'Musso', 'Nexia', 'Nubira', 'Racer', 'Rezzo', 'Tacuma', 'Tico'],
      'Daihatsu' => ['Applause', 'Charade', 'Charmant', 'Copen', 'Cuore', 'Feroza', 'Fourtrak', 'Freeclimbe', 'Gran Move', 'Hijet', 'Materia', 'Move', 'Rocky', 'Sirion', 'Sportrak', 'Terios', 'YRV'],
      'DFSK' => ['Double Cab', 'EC 31', 'EC 35', 'Fengon 5', 'Fengon 500', 'Fegon 580', 'Mini Bus', 'Mini Van', 'Pick Up', 'Seres 3'],
      'DKW' => ['Schnellaster van', 'F10', 'F89', '3=6', 'Monza', 'Munga off-road', 'Junior', 'F102'],
      'Dodge' => ['Avenger', 'Caliber', 'Varavan', 'Challenger', 'Charger', 'Dakota', 'Dart', 'Daytona', 'Diplomat', 'Durango', 'Dynasty', 'Grand Caravan', 'Hornet', 'Intrepid', 'Journey', 'Magnum', 'Neon', 'Nitro', 'Omni', 'RAM', 'Sprint', 'Stealth', 'Stratus', 'Viper'],
      'DR' => ['DR 1.0', 'DR 3.0', 'DR 4.0', 'DR 5.0', 'DR 6.0', 'DR 7.0', 'DR PK8', 'DR1', 'DR2', 'DR3', 'DR4', 'DR5', 'DR 6', 'DR CityCross', 'DR F35', 'DR Zero', 'EVO 3', 'EVO 4', 'EVO 5', 'EVO 7', 'EVO Cross 4', 'ICKK K2', 'Sportequipe 5', 'Sportequipe 6', 'Sportequipe 7'],
      'DS Automobiles' => ['DS 3', 'DS 3 Crossback', 'DS 4', 'DS 4 Crossback', 'DS 5', 'DS 7 Crossback', 'DS 9'],
      'Eagle' => ['Medallion', 'Premier', 'Summit', 'Talon', 'Vision'],
      'Excalibur' => ['Phaeton', 'Roadster'],
      'FAW' => ['HQ', 'NAT'],
      'Ferrari' => ['208/308', '296 GTB', '328', '348', '360', '400', '412', '456', '458', '488 GTB', '488 Spider', '512', '575', '599', '612', '812', 'California', 'Dino', 'Enzo', 'F12', 'F355', 'F40', 'F430', 'F50', 'F8', 'FF', 'FXX', 'GTC4Lusso', 'LaFerrari', 'Mondial', 'Portofino', 'Purosangue', 'Roma', 'SF90 Stradale', 'Superamerica', 'Testarossa'],
      'Fiat' => ['124', '125p', '126', '127', '128', '130', '131', '132', '500', '500L', '500X', '600', '850', 'Albea', 'Barchetta', 'Brava', 'Bravo', 'Cinquecento', 'Coupé', 'Croma', 'Dino', 'Doblo', 'Ducato', 'Fiorino', 'Freemont', 'Fullback', 'Grande Punto', 'Idea', 'Linea', 'Marea', 'Multipla', 'Palio', 'Panda', 'Punto', 'Qubo', 'Regata', 'Ritmo', 'Scudo', 'Sedici', 'Seicento', 'Siena', 'Spider Europa', 'Stilo', 'Strada', 'Talento', 'Tempera', 'Tipo', 'Ulysse', 'Uno', 'X 1/9'],
      'Ford' => ['Aerostar', 'Aspire', 'B-Max', 'Bronco', 'C-Max', 'Capri', 'Contour', 'Cougar', 'Courier', 'Crown', 'Econoline', 'Econovan', 'EcoSport', 'Edge', 'Escape', 'Escort', 'Excursion', 'Expedition', 'Explorer', 'F150', 'F250', 'F350', 'Fairlane', 'Falcon', 'Festiva', 'Fiesta', 'Five Hundred', 'Focus', 'Focus C-Max', 'Freestar', 'Freestyle', 'Fusion', 'Galaxy', 'Granada', 'Grand C-Max', 'GT', 'Ka', 'Ka+', 'Kuga', 'Maverick', 'Mercury', 'Mondeo', 'Mustang', 'Mustang Mach-E', 'Orion', 'Probe', 'Puma', 'Ranger', 'Raptor', 'S-Max', 'Scorpio', 'Sierra', 'Streetka', 'Taunus', 'Taurus', 'Tempo', 'Thunderbird', 'Tourneo', 'Tourneo Connect', 'Tourneo Courier', 'Tourneo Custom', 'Transit', 'Transit Connect', 'Transit Custom', 'Windstar'],
      'Genesis' => ['G70', 'G80', 'GV60', 'GV70', 'GV80'],
      'GMC' => ['Acadia', 'Canyon', 'Envoy', 'Jimmy', 'Safari', 'Savana', 'Sierra', 'Sonoma', 'Suburban', 'Syclone', 'Terrain', 'Typhoon', 'Vandura', 'Yukon'],
      'Gonow' => ['Emei', 'G3', 'G5', 'GA200', 'GX5', 'GX6', 'Starry', 'Way CL', 'Alter', 'Dual Luck', 'Fan', 'Finite', 'GA6530', 'GS-1', 'GS-2', 'GS50 II'],
      'Grecav' => ['Sonique', 'Eke Sport'],
      'Holden' => ['Adventra', 'Astra', 'Barina', 'Berlina', 'Calais', 'Caprice', 'Captiva', 'Colorado', 'Comodore', 'Crewman', 'Cruze', 'Epica', 'Jackaroo', 'Monaro', 'Sportwagon', 'Statesman', 'Ute', 'Viva'],
      'Honda' => ['Accord', 'Aerodeck', 'City', 'Civic', 'Concerto', 'CR-V', 'CR-Z', 'CRX', 'Element', 'eNS1', 'FR-V', 'Honda e', 'HR-V', 'Insight', 'Integra', 'Jazz', 'Legend', 'Logo', 'NSX', 'Odyssey', 'Pilot', 'Prelude', 'Ridgeline', 'S 2000', 'Shuttle', 'Stream', 'ZR-V'],
      'Hummer' => ['H1', 'H2', 'H3'],
      'Hyundai' => ['Accent', 'Atos', 'Avante', 'Azera', 'Bayon', 'Coupé', 'Elantra', 'Excel', 'Galloper', 'Genesis', 'Getz', 'Grand Santa Fe', 'Grandeur', 'H-1', 'H-1 Starex', 'H200', 'H350', 'i10', 'i20', 'i30', 'i40', 'Ioniq', 'ix20', 'ix35', 'ix55', 'KONA', 'Lantra', 'Matrix', 'Pony', 'S-Coupé', 'Santa Fe', 'Santamo', 'Sonata', 'Staria', 'Terracan', 'Trajet', 'Tucson', 'Veloster', 'Veracruz', 'XG'],
      'Ineos' => ['Grenadier', 'Grenadier Quartermaster'],
      'Infiniti' => ['EX 30', 'EX 35', 'EX 37', 'FX30', 'FX35', 'FX 37', 'FX 45', 'FX 50', 'G20', 'G35', 'G37', 'I30', 'I35', 'J30', 'M30', 'M35', 'M37', 'Q30', 'Q45', 'Q50', 'Q60', 'Q70', 'QX30', 'QX50', 'QX56', 'QX70', 'QX80'],
      'Isuzu' => ['Campo', 'D-Max', 'Gemini', 'Midi', 'Pick up', 'Trooper'],
      'Iveco' => ['Massif'],
      'Jaguar' => ['Daimler', 'E-Pace', 'E-Type', 'F-Pace', 'F-Type', 'I-Pace', 'MK II', 'S-Type', 'X-Type', 'XE', 'XF', 'XJ', 'XJS', 'XK', 'XKB', 'XKR'],
      'Jeep' => ['Avenger', 'Cherokee', 'CJ', 'Comanche', 'Commander', 'Compass', 'Gladiator', 'Grand Cherokee', 'Liberty', 'Patriot', 'Renegade', 'Wagoneer', 'Willys', 'Wrangler'],
      'Kaipan' => ['14', '15', '16', '47', '57'],
      'KG Mobility' => ['Actyon', 'Family', 'Korrando', 'Kyron', 'Musso', 'Rexton', 'Rodius', 'Tivoli', 'Tivoli Grand', 'XLV'],
      'Kia' => ['Asia Rocsta', 'Besta', 'Carens', 'Carnival', 'Ceed', 'Cerato', 'Clarus', 'Elan', 'EV6', 'EV6 GT', 'Joice', 'Leo', 'Magentis', 'Mentor', 'Niro', 'Opirus', 'Optima', 'Picanto', 'Pregio', 'Pride', 'Pro Ceed', 'Retona', 'Rio', 'Roadster', 'Rocsta', 'Sedona', 'Sephia', 'Shuma', 'Serento', 'Soul', 'Spectra', 'Sportage', 'Stinger', 'Stonic', 'Venga', 'XCeed'],
      'Koenigsegg' => ['Agera', 'Gemera', 'Jesko', 'One:1', 'Regera'],
      'KTM X-Bow' => ['GT', 'GT-XR', 'GT2', 'GT4', 'GTX', 'R', 'RR'],
      'Lada' => ['110 / 2110', '111 / 2111', '112 / 2112', 'Aleko', 'Forma', 'Granta', 'Kalina', 'Largus', 'Niva', 'Nova', 'Priora', 'Samara', 'Vesta', 'XRAY'],
      'Lamborghini' => ['Aventador', 'Centenario', 'Countach', 'Diablo', 'Espada', 'Essenza SCV12', 'Gallardo', 'Huracan', 'Jalpa', 'LM', 'Miura', 'Murcielago', 'Reventon', 'Revuelto', 'SC 20', 'Sessto Elemento', 'Slan FKP 37', 'Urraco', 'Urus', 'Veneno'],
      'Lancia' => ['Beta', 'Dedra', 'Delta', 'Flamina', 'Flavia', 'Fulvia', 'Gamma', 'Kappa', 'Lybra', 'Musa', 'Phedra', 'Prisma', 'Stratos', 'Thema', 'Thesis', 'Voyager', 'Ypsilon', 'Zeta'],
      'Land Rover' => ['Defender', 'Discovery', 'Discovery Sport', 'Freelander', 'Range Rover', 'Range Rover Evoque', 'Range Rover Sport', 'Range Rover Velar', 'Range Rover Vogue'],
      'Lexus' => ['CT', 'LC 500', 'LC 500h', 'LFA', 'Série ES', 'Série GS', 'Série GX', 'Série IS', 'Série LS', 'Série LX', 'Série NX', 'Série RC', 'Série RX', 'Série SC', 'UX'],
      'Ligier' => ['Ambra', 'Be Sun', 'JS 50', 'JS 50 L', 'JS RC', 'Nova', 'Optima', 'X - Too'],
      'Lincoln' => ['Aviator', 'Continental', 'LS', 'Mark', 'MKX', 'MKZ', 'Nautilus', 'Navigator', 'Town Car'],
      'Lotus' => ['340R', 'Cortina', 'Eclat', 'Elan', 'Elise', 'Elite', 'Emira', 'Esprit', 'Europa', 'Evija', 'Evora', 'Excel', 'Exige', 'V8'],
      'LuAZ' => ['969', 'City', 'Farmer'],
      'Lynk & Co' => ['01', '02', '03', '05', '07', '06', '08', '09'],
      'Maruti' => ['800', '1000'],
      'Maserati' => ['222', '224', '228', '3200', '418', '420', '4200', '422', '424', '430', 'Biturbo', 'Coupé', 'Ghibli', 'GranCabrio', 'GranSport', 'GranTurismo', 'Grecale', 'Indy', 'Karif', 'Levante', 'MC12', 'MC20', 'Merak', 'Quattroporte', 'Shamal', 'Spyder'],
      'Maxus' => ['D60', 'D90', 'G10', 'G20', 'G50', 'G70', 'G90', 'T60', 'T70', 'T90', 'EV30', 'V70', 'V80', 'V90'],
      'Maybach' => ['57', '62', 'S 500', 'S 560 4Matic', 'S-560', 'S680 4Matic'],
      'Mazda' => ['121', '2', '3', '323', '5', '6', '626', '929', 'Bongo', 'BT-50', 'CX-3', 'CX-30', 'CX-5', 'CX-60', 'CX-7', 'Demio', 'Millenia', 'MPV', 'MX-3', 'MX-30', 'MX-5', 'MX-6', 'Premacy', 'Protege', 'RX-6', 'RX-7', 'RX-8', 'Série B', 'Série E', 'Tribute', 'Xedos'],
      'McLaren' => ['12C', '540C', '570GT', '570S', '600LT', '620R', '625C', '650C', '675LT', '720S', '765LT', 'Elva', 'F1', 'GT', 'P1', ''],
      'Mercedes-Benz' => ['190', 'A', 'AMG', 'AMG GT-S', 'B', 'C', 'CE', 'Citan', 'CL', 'CLA', 'CLC', 'CLE', 'CLK', 'CLS', 'E', 'EQA', 'EQB', 'EQC', 'EQE', 'EQS', 'EQV', 'G', 'GL', 'GLA', 'GLB', 'GLC', 'GLC Coupé', 'GLE', 'GLE Coupé', 'GLK', 'GLS', 'GLS Maybach', 'GT2', 'Marco Polo', 'MB 100', 'ML', 'Monarch', 'R', 'S', 'S Maybach', 'SL', 'SLC', 'SLK', 'SLR', 'SLS', 'Sprinter', 'T', 'V', 'Vaneo', 'Vario', 'Viano', 'Vito', 'W108', 'W111', 'W113', 'W114', 'W115', 'W116', 'W123', 'W124', 'W126', 'W201', 'X'],
      'Mercury' => ['Comet', 'Cougar', 'Marauder', 'Mariner', 'Marquis', 'Milan', 'Montego', 'Monterey', 'Mountaineer', 'Sable', 'Tracer', 'Villager', 'Zephyr'],
      'Microcar' => ['Due', 'Flex', 'M.Go', 'M8', 'MC', 'Virgo'],
      'Mini' => ['Clubman', 'Cooper', 'Cooper S', 'Cooper SE', 'Countryman', 'ONE', 'Paceman', 'Roadster'],
      'Mitsubishi' => ['3000 GT', 'ASX', 'Canter', 'Carisma', 'Colt', 'Cordia', 'Cosmos', 'Diamante', 'Eclipse', 'Eclipse-Cross', 'Endeavor', 'FTO', 'Galant', 'Galloper', 'Grandis', 'i-MiEV', 'L200', 'L300', 'L400', 'Lancer', 'Lancer Evolution', 'Mirage', 'Montero', 'Outlander', 'Pajero', 'Pajero Pinin', 'Santamo', 'Sapporo', 'Sigma', 'Space Gear', 'Space Runner', 'Space Star', 'Space Wagon', 'Starion', 'Tredia'],
      'Morgan' => ['3 Wheeler', '4/4', 'Aero 8', 'Plus 4', 'Plus 8', 'Roadster'],
      'MPM Motors' => ['Erelis', 'PS160'],
      'Nissan' => ['100 NX', '200 SX', '240 SX', '280 ZX', '300 ZX', '350 Z', '370 Z', 'Almera', 'Almera Tino', 'Altima', 'Armada', 'Bluebird', 'Cherry', 'Cube', 'Evalia', 'Frontier', 'GT-R', 'Interstar', 'Juke', 'King Cab', 'Kubistar', 'Laurel', 'LEAF', 'Maxima', 'Micra', 'Murano', 'Navara', 'Note', 'NP300 Pickup', 'NV200', 'NV400', 'Pathfinder', 'Patrol', 'Pickup', 'Pixo', 'Prairie', 'Primastar', 'Primera', 'Pulsar', 'Qashqai', 'Qashqai+2', 'Quest', 'Rogue', 'Sentra', 'Serena', 'Silvia', 'Skyline', 'Stanza', 'Sunny', 'Terrano', 'Tiida', 'Titan', 'Trade', 'Urvan', 'Vanette', 'X-Trail', 'Xterra'],
      'NSU' => ['1000', 'RO 80'],
      'Nysa' => ['Série 500', 'Série N'],
      'Opel' => ['Adam', 'Agila', 'Altul', 'Ampera', 'Ampera-e', 'Antara', 'Arena', 'Ascona', 'Astra', 'Calibra', 'Campo', 'Cascada', 'Combo', 'Commodore', 'Corsa', 'Crossland', 'Diplomat', 'Frontera', 'Grandland', 'GT', 'Insignia', 'Kadett', 'Karl', 'Manta', 'Meriva', 'Mokka', 'Monterey', 'Monza', 'Movano', 'Nova', 'Omega', 'Pick up Sportcap', 'Rekord', 'Senator', 'Signum', 'Sintra', 'Speedster', 'Tigra', 'Vectra', 'Vivaro', 'Zafira'],
      'Peugeot' => ['1007', '104', '106', '107', '108', '2008', '204', '205', '206', '207', '208', '3008', '301', '304', '305', '306', '307', '308', '309', '4007', '4008', '404', '405', '406', '407', '408', '5008', '504', '505', '508', '604', '605', '607', '806', '807', 'Bipper', 'Boxer', 'Expert', 'iON', 'Partner', 'RCZ', 'Rifter', 'Traveller'],
      'Plymouth' => ['Barracuda', 'Fury', 'GTX', 'Prowler', 'Superbird'],
      'Polonez' => ['1.5', '1.6', 'Atu', 'Caro'],
      'Pontiac' => ['1000', '6000', 'Bonneville', 'Catalina', 'Chieftain', 'Fiero', 'Firebird', 'G6', 'Grand-Am', 'Grand-Prix', 'GTO', 'Le Mans', 'Montana', 'Solstice', 'Sunbird', 'Sunfire', 'Targa', 'Trans Sport', 'Vibe'],
      'Porsche' => ['356', '911', '911-Turbo-S', '912', '914', '924', '928', '944', '959', '962', '968', '992', '992 Turbo S', 'Boxster', 'Carrera GT', 'Cayenne', 'Cayenne Coupé', 'Cayman', 'Macan', 'Panamera', 'Taycan'],
      'Proton' => ['Série 300', 'Série 400'],
      'Renault' => ['10', '11', '12', '14', '16', '18', '19', '20', '21', '25', '30', '4', '5', '8', '9', 'Alaskan', 'Arkana', 'Austral', 'Avantime', 'Captur', 'Clio', 'Espace', 'Express', 'Fluence', 'Fuego', 'Grand Espace', 'Grand Scenic', 'Kadjar', 'Kangoo', 'Koleos', 'Laguna', 'Latitude', 'Master', 'Megane', 'Modus', 'Safrane', 'Scenic', 'Scenic RX4', 'Symbol', 'Talisman', 'Trafic', 'Twingo', 'Twizy', 'Vel Satis', 'Wind', 'ZOE'],
      'Rivian' => ['R1S', 'R1T'],
      'Rols-Royce' => ['Corniche', 'Cullinan', 'Dawn', 'Flying Spur', 'Ghost', 'Park Ward', 'Phantom', 'Silver Cloud', 'Silver Down', 'Silver Seraph', 'Silver Shadow', 'Silver Spirit', 'Silver Spur', 'Touring Limousine', 'Wraith'],
      'Rover' => ['100', '200', '25', '400', '45', '600', '75', '800', '825', 'City Rover', 'Metro', 'Montego', 'SD', 'Streetwise',],
      'Saab' => ['9-2X', '9-3', '9-3X', '9-4X', '9-5', '9-7X', '90', '900', '9000', '96', '99'],
      'Samsung' => ['QM5'],
      'Saturn' => ['Astra', 'Aura', 'ION Quad Coupé', 'ION Sedan', 'Outlook', 'Relay', 'SC', 'Sky', 'SL', 'SW', 'VUE'],
      'Seat' => ['Alhambra', 'Altea', 'Altea XL', 'Arona', 'Arosa', 'Ateca', 'Cordoba', 'Exeo', 'Ibiza', 'Inca', 'Leon', 'Malaga', 'Marbella', 'Mii', 'Ronda', 'Tarraco', 'Terra', 'Toledo'],
      'Skoda' => ['100', '105', '120', '130', '135', 'Citigo', 'Enyaq', 'Fabia', 'Favorit', 'Felicia', 'Forman', 'Kamiq', 'Karoq', 'Kodiaq', 'Octavia', 'Praktik', 'Rapid', 'Roomster', 'Scala', 'Superb', 'Yeti'],
      'Skywell' => ['ET5', 'Jackdaw'],
      'Smart' => ['#1', 'Crossblade', 'Forfour', 'Fortwo', 'Roadster'],
      'SsangYong' => ['Actyon', 'Family', 'Korando', 'Kyron', 'Musso', 'Rexton', 'Rodius', 'Tivoli', 'Tivoli Grand', 'Torres', 'XLV'],
      'Subaru' => ['Ascent', 'B9 Tribeca', 'Baja', 'BRZ', 'Forester', 'G3X Justy', 'Impreza', 'Justy', 'Legacy', 'Leone', 'Levorg', 'Libero', 'Outback', 'SVX', 'Trezia', 'Tribeca', 'Vivio', 'WRX STI', 'XT', 'XV'],
      'Suzuki' => ['Across', 'Alto', 'Balenp', 'Cappucino', 'Carry', 'Celerio', 'Grand Vitara', 'Ignis', 'Jimmy', 'Kizashi', 'Liana', 'LJ', 'Reno', 'Samurai', 'Splash', 'Super-Carry', 'Swace', 'Swift', 'SX4', 'SX4 S-Cross', 'Vitara', 'Wagon R+', 'X-90', 'XL7'],
      'Syrena' => ['101', '102', '103', '104', '105', 'Bosto', 'R-20'],
      'Tarpan' => ['233', '235', '237', 'Honker'],
      'Tata' => ['Aria', 'Indica', 'Indigo', 'Nano', 'Safari', 'Sumo', 'Telcoline', 'Xenon'],
      'Tatra' => ['T613', 'T613-4', 'T700'],
      'Tavria' => ['ZAZ 1102', 'ZAZ 1103', 'ZAZ 1105'],
      'Tazzari' => ['EM1', 'Zero', 'Zero Evo', 'Zero SE', 'Zero Speedster', 'Zero City', 'Zerro EM2 Space', 'Zerro Junior'],
      'Tesla' => ['Cybertruck', 'Model 3', 'Model S', 'Model X', 'Model Y', 'Roadster'],
      'Toyota' => ['4Runner', 'Alphard', 'Auris', 'Avalon', 'Avensis', 'Aygo', 'BZ4X', 'C-HR', 'Camry', 'Carina', 'Celica', 'Corolla', 'Corolla Cross', 'Corolla Verso', 'Cressida', 'Crown', 'FJ', 'Fortuner', 'GT86', 'Harrier', 'Hiace', 'Highlander', 'Hilux', 'iQ', 'Land Cruiser', 'Lite-Ace', 'Matrix', 'Mirai II', 'MR2', 'Paseo', 'Picnic', 'Previa', 'Prius', 'Prius+', 'Proace', 'RAV4', 'Sequoia', 'Sienna', 'Starlet', 'Supra', 'Tacoma', 'Tercel', 'Tundra', 'Urban Cruiser', 'Venza', 'Verso', 'Yaris', 'Yaris Cross', ''],
      'Trabant' => ['1.1', '601', 'P 50'],
      'Triumph' => ['Acclaim', 'Dolomite', 'Spitfire', 'Stag', 'Toledo', 'TR3', 'TR4', 'TR5', 'TR6', 'TR7', 'TR8'],
      'TVR' => ['Cerbera', 'Chimaera', 'Griffith', 'S', 'Sagaris', 'Tamora', 'Tasmin', 'Tuscan', 'Vixen'],
      'Vauxhall' => ['Astra', 'Frontera', 'Omega', 'Vectra'],
      'Volkswagen' => ['181', 'Amarok', 'Arteon', 'Atlas', 'Beetle', 'Bora', 'Buggy', 'Caddy', 'California', 'Caravelle', 'Corrado', 'Crafter', 'e-Golf', 'Eos', 'Fox', 'Garbus', 'Golf', 'Golf Plus', 'Golf Sportsvan', 'ID.Buzz', 'ID.3', 'ID.4', 'ID.5', 'Iltis', 'Jetta', 'Kafer', 'Karmann Ghia', 'Lupo', 'Multivan', 'New Beetle', 'Passat', 'Passat Alltrack', 'Passat CC', 'Phaeton', 'Polo', 'Santana', 'Scirocco', 'Sharan', 'T-Cross', 'T-ROC', 'Taigo', 'Tiguan', 'Touareg', 'Touran', 'Transporter', 'up!', 'Vento'],
      'Volvo' => ['240', '340', '360', '440', '460', '480', '740', '760', '850', '940', '960', 'Amazon', 'C30', 'C40', 'C70', 'EX30', 'Polar', 'S40', 'S60', 'S70', 'S80', 'S90', 'V40', 'V50', 'V60', 'V70', 'V90', 'XC 40', 'XC 60', 'XC 70', 'XC 90'],
      'Warszawa' => ['203', '204', '223', '224', 'M-20', 'Pick-up'],
      'Xev' => ['Kitty', 'Yoyo'],
      'Yugo' => ['102', 'Florida', 'Koral'],
      'Zaporożec' => ['965', '968'],
      'Zastawa' => ['1100', '750'],
    ];

    foreach ($modelsByMarque as $marqueNom => $modeleNoms) {

      $marque = $this->getReference('mar-' . $this->i);
      $marqueId = $this->i;
      //var_dump("Marque ID : ".$marqueId); 
      

      foreach ($modeleNoms as $modeleNom) {
       
        $modele = new Modele();
        $modele->setNom($modeleNom);
        $modele->setMarque($marque);

        $manager->persist($modele);
        $this->addReference("mod-$this->i-" . $this->j, $modele);

        // Add debugging statement
        //var_dump("Modele Reference from modele: mod-".$this->i."-" . $this->j);

        $this->j++;
        $this->counter++;
        $this->k++;
      }
      $this->i++;
      $this->counter = 1;
    }
    $manager->flush();
  }

  public function getDependencies(): array
  {
    return [
      MarqueFixtures::class,
    ];
  }
}
