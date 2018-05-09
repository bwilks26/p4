<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        # Define products array as starting data for seeding products table
        $products = [
            ["ENGINES", 102486, "Engine, 3306TA 203HP (B-Model) Stripped", 37, 0, 32202, 1191474],
            ["ENGINES", 101183, "Engine, G855-C  188HP", 7, 0, 30600, 214200],
            ["ENGINES", 101185, "Engine, KTA19 380HP", 3, 0, 68100, 204300],
            ["ENGINES", 102548, "Engine, 3406TA 276HP", 3, 0, 56993, 170979],
            ["ENGINES", 101184, "Engine, GTA855 225HP", 4, 0, 36500, 146000],
            ["ENGINES", 102290, "Engine, GTA855P3 286HP", 2, 0, 34846, 69692],
            ["ENGINES", 102286, "Gen Set, VR 260 47HP", 4, 0, 13904.26, 55617.04],
            ["ENGINES", 101190, "Engine, 3306TA 211HP (A-Model)", 1, 0, 34663, 34663],
            ["ENGINES", 100166, "Engine, G8.3C 118HP", 2, 0, 16280, 32560],
            ["ENGINES", 102419, "Engine, G5.9 Power Unit 49HP", 2, 0, 12900, 25800],
            ["ENGINES", 102287, "Engine, VRG330 Cross Flow 72HP", 2, 0, 10613.18, 21226.36],
            ["ENGINES", 101138, "Engine, G5.9 84HP", 2, 2, 10450, 20900],
            ["ENGINES", 102289, "Engine, G5.9 49HP", 2, 0, 8975.48, 17950.96],
            ["ENGINES", 101238, "Engine, G5.9 Power Unit 84HP", 1, 0, 13928.34, 13928.34],
            ["COOLERS", 102400, "Cooler, AXH 60VVI G3306NA/JGQ/2 700RPM", 107, 0, 21375, 2287125],
            ["COOLERS", 101252, "Cooler, AXH 108VVI PRECOOLER", 12, 0, 36904, 442848],
            ["COOLERS", 102321, "Cooler, AXH 72VVI 3306TA/JGQ", 14, 0, 28126, 393764],
            ["COOLERS", 102340, "Cooler, AXH 60VVI G855NA/JGQ", 14, 0, 22976, 321664],
            ["COOLERS", 102385, "Cooler, AXH 84VVI KTA19/JGJ 13 / 11.5", 6, 0, 33286, 199716],
            ["COOLERS", 102320, "Cooler, AXH 72VVI GTA855/JGQ", 5, 0, 27490, 137450],
            ["COOLERS", 102323, "Cooler, AXH 36VVI POWERUNIT", 10, 0, 12043, 120430],
            ["COOLERS", 102365, "Cooler, FIN-X VT-48-7 G8.3 JGP/2  2 STG", 4, 0, 17300, 69200],
            ["COOLERS", 101249, "Cooler, R&R R-84-R12 KTA19C/JGJ", 2, 0, 33830, 67660],
            ["COOLERS", 102296, "Cooler, AXH 72VVI Pre-Cooler", 3, 0, 21561, 64683],
            ["COOLERS", 102646, "Cooler, AXH 84VVI G3406TA JGA4/3 7.5", 2, 0, 31920, 63840],
            ["COOLERS", 102301, "Cooler, R&R UI-93-12S GD U&Y", 2, 0, 29760, 59520],
            ["COOLERS", 102022, "Cooler, GHT AOX-70EP", 21, 0, 2528.47, 53097.87],
            ["COOLERS", 101253, "Cooler, GHT AOX40-EP, LeROI 10000 VRU", 31, 0, 1401.43, 43444.33],
            ["COOLERS", 101250, "Cooler, AXH 48VVI 8.3", 2, 0, 18723, 37446],
            ["COOLERS", 103303, "Cooler, GHT 1929 V2   GVRU", 4, 4, 4940, 19760],
            ["COOLERS", 102368, "Cooler, FIN-X VT-48-7 G8.3/5.9 JGP 2/3", 1, 0, 18668, 18668],
            ["COOLERS", 102300, "Cooler, R&R R-68-9N", 1, 0, 17680, 17680],
            ["COOLERS", 102507, "Cooler, ETR 84-54-S46-VIE 8.3/5.9 JGP2/3", 1, 0, 15433, 15433],
            ["COOLERS", 102322, "Cooler, AXH 26VVI POWERUNIT", 2, 0, 7713, 15426],
            ["COOLERS", 102297, "Cooler, Chart V54", 1, 0, 11396, 11396],
            ["COMP", 101189, "Compressor, JGJ2-3 11.5\" x 7-3/8\"x3-7/8\"", 6, 0, 80562.08, 483372.48],
            ["COMP", 101100, "Compressor, JGQ2-3 7.5\" x 5-1/8\" x 3\"", 7, 0, 40131.13, 280917.91],
            ["COMP", 102642, "Compressor, JGA4-3 7.5\" x 5.125\" x 3\"", 3, 0, 78297.29, 234891.87],
            ["COMP", 102800, "Cylinder, Compressor 13.0\" 300 MAWP", 4, 0, 29733.71, 118934.84],
            ["COMP", 102482, "Compressor, JGP2-2 4-3/4JG x 2-1/2M", 4, 0, 29329.7, 117318.8],
            ["COMP", 101187, "Compressor, Screw LeROI HG10000HIBP", 27, 0, 4413.5, 119164.5],
            ["COMP", 102260, "Compressor, JGP2-3 6.5\" x 4-3/8\" x 2-3/4", 2, 0, 31612.27, 63224.54],
            ["COMP", 102280, "Compressor, Screw LeROI HGF12000HIEP", 10, 0, 6110, 61100],
            ["COMP", 102279, "Compressor, Gardner Denver SSQG99B", 2, 0, 14333.67, 28667.34],
            ["COMP", 102282, "Compressor, Screw LeROI HG24158VIE", 1, 0, 17719.74, 17719.74],
            ["COMP", 102787, "Compressor, Screw LeROI HG10000HIP", 7, 0, 4413.5, 30894.5],
            ["COMP", 102281, "Compressor, Screw LeROI HG17235VIEPS G4", 1, 0, 13611, 13611],
            ["COMP", 102278, "Compressor, Gardner Denver SSPG99D Reman", 1, 0, 11224.8, 11224.8],
            ["COMP", 102284, "Compressor, Gardner Denver SSFG99B", 1, 0, 6501.6, 6501.6],
            ["PANELS", 102405, "Panel, Murphy, TTD EICS 50309744", 24, 0, 6635, 159240],
            ["PANELS", 100211, "Panel, Murphy, TTD TK2 3 Stage 50309307", 14, 0, 7030, 98420],
            ["PANELS", 100402, "Panel, Murphy, TTD 50-30-8546", 15, 0, 6500, 97500],
            ["PANELS", 102755, "Panel, VRU 25HP/3HP VFD PLC HMI A/C", 8, 0, 11736, 93888],
            ["PANELS", 101262, "Panel, Murphy, TTD TK4 3 Stage 50309468", 13, 0, 7120, 92560],
            ["PANELS", 102745, "Panel, VRU 60HP/3HP VFD PLC HMI A/C", 4, 0, 15729, 62916],
            ["PANELS", 102818, "Panel, Murphy Centurion TK4 503010388", 5, 0, 9255, 46275],
            ["PANELS", 102764, "Panel, Murphy, Centurion EICS 503010311", 5, 0, 8115, 40575],
            ["PANELS", 102305, "Panel, Murphy Centurion 50308371", 5, 0, 6601.58, 33007.9],
            ["PANELS", 102756, "Panel, VRU 50HP/3HP VFD PLC HMI A/C", 2, 0, 15986.95, 31973.9],
            ["PANELS", 100401, "Panel, Murphy, Centurion 50-30-8794", 3, 0, 8825, 26475],
            ["PANELS", 102435, "Panel, TTD 2 Stg 50-30-9954 with AFR", 4, 0, 6615, 26460],
            ["PANELS", 102821, "Panel, Murphy TTD TK4 4/3Stage 503010403", 3, 0, 7715, 23145],
            ["PANELS", 102478, "Panel, Startr, 200HP/15HP Class 1 Div 2", 2, 0, 9111, 18222],
            ["PANELS", 103180, "Panel, Murphy VRU Pro 503010780", 5, 0, 3640, 18200],
            ["PANELS", 102304, "Panel, Murphy Centurion 50308246", 2, 0, 6446.54, 12893.08],
            ["PANELS", 102481, "Panel, Norbg Starter, 75HP&10HP SSR DPLX", 1, 0, 7167, 7167],
            ["PANELS", 100838, "DNU Panel, Murphy,  TTD 2 Stg 50308904", 1, 0, 4805, 4805],
            ["PANELS", 102303, "Panel, Murphy TTD 50307940", 1, 0, 3621.25, 3621.25],
            ["MOTORS", 102474, "Motor, Electric 200HP SSRV DPLX C1D2", 2, 0, 8491, 16982],
            ["MOTORS", 103297, "Motor, Elec 60HP 1800RPM SIEMENS C1D2", 3, 0, 2569, 7707],
            ["MOTORS", 102752, "Motor, 25HP 1800RPM HyundaiC1D2 230/460V", 4, 0, 1028, 4112],
            ["MOTORS", 102753, "Motor, 40HP 1800RPM HyundaiC1D2 230/460V", 2, 0, 1687, 3374],
            ["MOTORS", 102477, "Motor, Electric15HP SSRV DPLX C1D2", 2, 0, 1365, 2730],
            ["MOTORS", 103140, "Motor, Electric 1HP 1800RPM 24VDC 56C", 4, 0, 526.25, 2105],
            ["MOTORS", 102742, "Motor, Electric 40HP 1800RPM SIEMENS", 1, 0, 1892, 1892],
            ["MOTORS", 102295, "Motor, 25HP 1800RPM WEG 02018ET3E284-W22", 1, 0, 995, 995],
            ["MOTORS", 103070, "Motor, Electric 2HP 1800RPM 24VDC 56CZ", 1, 0, 906.91, 906.91]
        ];

        # Create new products in database with starting data
        $count = count($products);

        foreach ($products as $key => $productInfo) {
            $product = new Product();

            $product->product_code = $productInfo[0];
            $product->item_number = $productInfo[1];
            $product->description = $productInfo[2];
            $product->quantity = $productInfo[3];
            $product->on_order = $productInfo[4];
            $product->price_per_unit = $productInfo[5];
            $product->total = $productInfo[6];

            $product->save();
            $count--;
        }
    }
}
