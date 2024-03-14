<?php

//Google Maps API Key
$api_key = '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATR9HPYozaZE1YdlI1b7Fn_k34TtRXzLg&libraries=geometry"></script>';

// Database connection parameters
$host = 'localhost'; // Your MySQL host (usually 'localhost')
$dbname = 'tresadb'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, display error message
    echo "Connection failed: " . $e->getMessage();
}

$tresaCoords = [
        ['lng' => -2.5818852, 'lat' => 51.4440896],
        ['lng' => -2.5831876, 'lat' => 51.4435934],
        ['lng' => -2.5836115, 'lat' => 51.4436801],
        ['lng' => -2.5846322, 'lat' => 51.4435235],
        ['lng' => -2.584329, 'lat' => 51.4429396],
        ['lng' => -2.5838328, 'lat' => 51.4423825],
        ['lng' => -2.5829775, 'lat' => 51.4417546],
        ['lng' => -2.5831239, 'lat' => 51.4416366],
        ['lng' => -2.5826032, 'lat' => 51.4412959],
        ['lng' => -2.5817857, 'lat' => 51.4408569],
        ['lng' => -2.5815981, 'lat' => 51.440716],
        ['lng' => -2.5806542, 'lat' => 51.4402291],
        ['lng' => -2.579763, 'lat' => 51.4396492],
        ['lng' => -2.5791884, 'lat' => 51.439932],
        ['lng' => -2.578968, 'lat' => 51.4398057],
        ['lng' => -2.5784687, 'lat' => 51.43988],
        ['lng' => -2.5766441, 'lat' => 51.4404444],
        ['lng' => -2.5753102, 'lat' => 51.4408026],
        ['lng' => -2.5747741, 'lat' => 51.440606],
        ['lng' => -2.5743024, 'lat' => 51.4403558],
        ['lng' => -2.5735958, 'lat' => 51.4398188],
        ['lng' => -2.5730403, 'lat' => 51.4392357],
        ['lng' => -2.5723471, 'lat' => 51.43858],
        ['lng' => -2.5717026, 'lat' => 51.43866],
        ['lng' => -2.5711224, 'lat' => 51.4386731],
        ['lng' => -2.5702198, 'lat' => 51.4387031],
        ['lng' => -2.5702196, 'lat' => 51.4393829],
        ['lng' => -2.5700318, 'lat' => 51.4397668],
        ['lng' => -2.570194, 'lat' => 51.4402366],
        ['lng' => -2.5694637, 'lat' => 51.44198],
        ['lng' => -2.5698817, 'lat' => 51.4419935],
        ['lng' => -2.5711412, 'lat' => 51.4419531],
        ['lng' => -2.571816, 'lat' => 51.442025],
        ['lng' => -2.5721533, 'lat' => 51.44257],
        ['lng' => -2.5731737, 'lat' => 51.4425129],
        ['lng' => -2.5741512, 'lat' => 51.4425695],
        ['lng' => -2.5751958, 'lat' => 51.4426859],
        ['lng' => -2.5766365, 'lat' => 51.4432324],
        ['lng' => -2.5779223, 'lat' => 51.4439221],
        ['lng' => -2.5784802, 'lat' => 51.4444175],
        ['lng' => -2.5786923, 'lat' => 51.4448068],
        ['lng' => -2.5788767, 'lat' => 51.4452006],
        ['lng' => -2.5792923, 'lat' => 51.4450905],
        ['lng' => -2.5797187, 'lat' => 51.4449469],
        ['lng' => -2.5798578, 'lat' => 51.444957],
        ['lng' => -2.5807293, 'lat' => 51.4445358],
        ['lng' => -2.5818852, 'lat' => 51.4440896]
];


$areas = [
    [
        ['lng' => -2.5789365, 'lat' => 51.445161],
        ['lng' => -2.5796044, 'lat' => 51.4449487],
        ['lng' => -2.5790653, 'lat' => 51.4445274],
        ['lng' => -2.5788453, 'lat' => 51.4444221],
        ['lng' => -2.5791109, 'lat' => 51.4442098],
        ['lng' => -2.5787354, 'lat' => 51.4442633],
        ['lng' => -2.5786844, 'lat' => 51.4441111],
        ['lng' => -2.5789499, 'lat' => 51.4439707],
        ['lng' => -2.578738, 'lat' => 51.4439724],
        ['lng' => -2.5786683, 'lat' => 51.4439958],
        ['lng' => -2.5786388, 'lat' => 51.4440292],
        ['lng' => -2.5786361, 'lat' => 51.4440978],
        ['lng' => -2.5787595, 'lat' => 51.4446494],
        ['lng' => -2.5788239, 'lat' => 51.4448701],
        ['lng' => -2.5788856, 'lat' => 51.4450406],
        ['lng' => -2.5789365, 'lat' => 51.445161]
    ],

    [
        ['lng' => -2.5786155, 'lat' => 51.4423765],
        ['lng' => -2.5783097, 'lat' => 51.4424033],
        ['lng' => -2.5784707, 'lat' => 51.4431188],
        ['lng' => -2.5785565, 'lat' => 51.4433261],
        ['lng' => -2.5785941, 'lat' => 51.4434766],
        ['lng' => -2.5785404, 'lat' => 51.4435735],
        ['lng' => -2.5786155, 'lat' => 51.443841],
        ['lng' => -2.5786906, 'lat' => 51.4438744],
        ['lng' => -2.5787872, 'lat' => 51.4438577],
        ['lng' => -2.5788355, 'lat' => 51.4438042],
        ['lng' => -2.5788247, 'lat' => 51.4437039],
        ['lng' => -2.5788707, 'lat' => 51.4436639],
        ['lng' => -2.5786155, 'lat' => 51.4423765]  
    ],

    [
        ['lng' => -2.5783574, 'lat' => 51.4442414],
        ['lng' => -2.5784406, 'lat' => 51.4442092],
        ['lng' => -2.5784104, 'lat' => 51.4439769],
        ['lng' => -2.5783688, 'lat' => 51.4440011],
        ['lng' => -2.5783232, 'lat' => 51.4440178],
        ['lng' => -2.5782703, 'lat' => 51.4440324],
        ['lng' => -2.5781898, 'lat' => 51.4440425],
        ['lng' => -2.5781851, 'lat' => 51.4440855],
        ['lng' => -2.5782052, 'lat' => 51.4441093],
        ['lng' => -2.5783467, 'lat' => 51.4442439],
        ['lng' => -2.5783574, 'lat' => 51.4442414]
    ],

    [
        ['lng' => -2.5762399, 'lat' => 51.4416028],
        ['lng' => -2.5765845, 'lat' => 51.4414724],
        ['lng' => -2.5765671, 'lat' => 51.4414506],
        ['lng' => -2.576382, 'lat' => 51.4414055],
        ['lng' => -2.5762801, 'lat' => 51.441362],
        ['lng' => -2.5761581, 'lat' => 51.4412977],
        ['lng' => -2.5760602, 'lat' => 51.4412467],
        ['lng' => -2.5757477, 'lat' => 51.4413637],
        ['lng' => -2.5757826, 'lat' => 51.441393],
        ['lng' => -2.5758228, 'lat' => 51.4414197],
        ['lng' => -2.5759395, 'lat' => 51.4414749],
        ['lng' => -2.5760374, 'lat' => 51.4415217],
        ['lng' => -2.5761634, 'lat' => 51.4415735],
        ['lng' => -2.5762399, 'lat' => 51.4416028] 
    ],

    [
        ['lng' => -2.5757309, 'lat' => 51.4428488],
        ['lng' => -2.575932, 'lat' => 51.4428187],
        ['lng' => -2.5761681, 'lat' => 51.4427351],
        ['lng' => -2.5765409, 'lat' => 51.4426281],
        ['lng' => -2.5765516, 'lat' => 51.4425663],
        ['lng' => -2.5762807, 'lat' => 51.4422068],
        ['lng' => -2.5761842, 'lat' => 51.4422353],
        ['lng' => -2.576211, 'lat' => 51.4422804],
        ['lng' => -2.5755726, 'lat' => 51.4425094],
        ['lng' => -2.5753661, 'lat' => 51.4425813],
        ['lng' => -2.5753312, 'lat' => 51.4426833],
        ['lng' => -2.5752507, 'lat' => 51.4426666],
        ['lng' => -2.5752427, 'lat' => 51.442695],
        ['lng' => -2.5755565, 'lat' => 51.4428087],
        ['lng' => -2.5757309, 'lat' => 51.4428488]
    ],

    [
        ['lng' => -2.5736274, 'lat' => 51.4405277],
        ['lng' => -2.5736086, 'lat' => 51.4404943],
        ['lng' => -2.5735067, 'lat' => 51.4404926],
        ['lng' => -2.5734209, 'lat' => 51.4404541],
        ['lng' => -2.5726886, 'lat' => 51.4399392],
        ['lng' => -2.5725947, 'lat' => 51.4399191],
        ['lng' => -2.5725062, 'lat' => 51.4399308],
        ['lng' => -2.5725277, 'lat' => 51.4399877],
        ['lng' => -2.5724526, 'lat' => 51.440001],
        ['lng' => -2.5724633, 'lat' => 51.4400245],
        ['lng' => -2.5723775, 'lat' => 51.4400445],
        ['lng' => -2.5723909, 'lat' => 51.4400763],
        ['lng' => -2.5723238, 'lat' => 51.4400897],
        ['lng' => -2.5723993, 'lat' => 51.4401541],
        ['lng' => -2.572405, 'lat' => 51.4402075],
        ['lng' => -2.572464, 'lat' => 51.440271],
        ['lng' => -2.5726464, 'lat' => 51.4404449],
        ['lng' => -2.5728717, 'lat' => 51.4406355],
        ['lng' => -2.5729575, 'lat' => 51.4407207],
        ['lng' => -2.5729924, 'lat' => 51.4407157],
        ['lng' => -2.5732767, 'lat' => 51.4406288],
        ['lng' => -2.5734028, 'lat' => 51.4405886],
        ['lng' => -2.573502, 'lat' => 51.4405535],
        ['lng' => -2.5736274, 'lat' => 51.4405277]
    ],

    [
        ['lng' => -2.5726564, 'lat' => 51.4410497],
        ['lng' => -2.5724814, 'lat' => 51.4411132],
        ['lng' => -2.5725095, 'lat' => 51.4411537],
        ['lng' => -2.5723647, 'lat' => 51.4412093],
        ['lng' => -2.5724036, 'lat' => 51.4412582],
        ['lng' => -2.5723768, 'lat' => 51.4413301],
        ['lng' => -2.572366, 'lat' => 51.441387],
        ['lng' => -2.5722131, 'lat' => 51.4414371],
        ['lng' => -2.5722572, 'lat' => 51.4415557],
        ['lng' => -2.5724946, 'lat' => 51.4415173],
        ['lng' => -2.5725053, 'lat' => 51.4415666],
        ['lng' => -2.5723028, 'lat' => 51.4416117],
        ['lng' => -2.572343, 'lat' => 51.4417413],
        ['lng' => -2.5719876, 'lat' => 51.4418249],
        ['lng' => -2.572057, 'lat' => 51.4419596],
        ['lng' => -2.5719041, 'lat' => 51.4419863],
        ['lng' => -2.5719524, 'lat' => 51.4420758],
        ['lng' => -2.5718652, 'lat' => 51.4420942],
        ['lng' => -2.5720918, 'lat' => 51.4424358],
        ['lng' => -2.5722474, 'lat' => 51.4423756],
        ['lng' => -2.5722903, 'lat' => 51.4422586],
        ['lng' => -2.5723761, 'lat' => 51.4422168],
        ['lng' => -2.5726041, 'lat' => 51.4422385],
        ['lng' => -2.5726578, 'lat' => 51.4421867],
        ['lng' => -2.5727543, 'lat' => 51.4419041],
        ['lng' => -2.5727838, 'lat' => 51.441757],
        ['lng' => -2.5728831, 'lat' => 51.4417737],
        ['lng' => -2.5729179, 'lat' => 51.4415831],
        ['lng' => -2.5729072, 'lat' => 51.4414093],
        ['lng' => -2.572816, 'lat' => 51.4412688],
        ['lng' => -2.5726564, 'lat' => 51.4410497]
    ],

    [
        ['lng' => -2.5843224, 'lat' => 51.4435502],
        ['lng' => -2.5844994, 'lat' => 51.4435168],
        ['lng' => -2.5844082, 'lat' => 51.4432894],
        ['lng' => -2.5842098, 'lat' => 51.4429618],
        ['lng' => -2.5839952, 'lat' => 51.4427143],
        ['lng' => -2.5838128, 'lat' => 51.4425137],
        ['lng' => -2.5834051, 'lat' => 51.4421727],
        ['lng' => -2.5830028, 'lat' => 51.4418617],
        ['lng' => -2.5824717, 'lat' => 51.441524],
        ['lng' => -2.5823108, 'lat' => 51.4415808],
        ['lng' => -2.5828257, 'lat' => 51.4419286],
        ['lng' => -2.5832763, 'lat' => 51.4422797],
        ['lng' => -2.5837377, 'lat' => 51.4426709],
        ['lng' => -2.5840113, 'lat' => 51.4429618],
        ['lng' => -2.5841668, 'lat' => 51.4432226],
        ['lng' => -2.5843224, 'lat' => 51.4435502]
    ],

    [
        ['lng' => -2.5789179, 'lat' => 51.4419231],
        ['lng' => -2.5791218, 'lat' => 51.441786],
        ['lng' => -2.5792881, 'lat' => 51.4416706],
        ['lng' => -2.579382, 'lat' => 51.4416071],
        ['lng' => -2.5793954, 'lat' => 51.4415519],
        ['lng' => -2.5793793, 'lat' => 51.4415068],
        ['lng' => -2.5793149, 'lat' => 51.4414717],
        ['lng' => -2.5792452, 'lat' => 51.4414667],
        ['lng' => -2.579111, 'lat' => 51.4415085],
        ['lng' => -2.5786282, 'lat' => 51.441791],
        ['lng' => -2.5785049, 'lat' => 51.4419013],
        ['lng' => -2.5785236, 'lat' => 51.4419197],
        ['lng' => -2.5787543, 'lat' => 51.4419181],
        ['lng' => -2.5788482, 'lat' => 51.4419264],
        ['lng' => -2.5788804, 'lat' => 51.4419448],
        ['lng' => -2.5789179, 'lat' => 51.4419231]
    ],

    [
        ['lng' => -2.5789749, 'lat' => 51.4413919],
        ['lng' => -2.5788891, 'lat' => 51.4414421],
        ['lng' => -2.5788033, 'lat' => 51.441432],
        ['lng' => -2.5786316, 'lat' => 51.4413384],
        ['lng' => -2.5786155, 'lat' => 51.4412682],
        ['lng' => -2.5786853, 'lat' => 51.4412247],
        ['lng' => -2.5786531, 'lat' => 51.4411913],
        ['lng' => -2.5785565, 'lat' => 51.4412515],
        ['lng' => -2.5785243, 'lat' => 51.4413083],
        ['lng' => -2.5787872, 'lat' => 51.4414788],
        ['lng' => -2.5788998, 'lat' => 51.4414788],
        ['lng' => -2.579109, 'lat' => 51.4413819],
        ['lng' => -2.5793987, 'lat' => 51.4412481],
        ['lng' => -2.5797367, 'lat' => 51.4411077],
        ['lng' => -2.580713, 'lat' => 51.4407533],
        ['lng' => -2.5809866, 'lat' => 51.4407031],
        ['lng' => -2.5804072, 'lat' => 51.4405593],
        ['lng' => -2.5802892, 'lat' => 51.4404858],
        ['lng' => -2.5801605, 'lat' => 51.4405961],
        ['lng' => -2.5798279, 'lat' => 51.4407767],
        ['lng' => -2.5795758, 'lat' => 51.4409037],
        ['lng' => -2.579624, 'lat' => 51.4409773],
        ['lng' => -2.5796026, 'lat' => 51.4410575],
        ['lng' => -2.5795221, 'lat' => 51.4411144],
        ['lng' => -2.5794685, 'lat' => 51.4411311],
        ['lng' => -2.5794041, 'lat' => 51.4410776],
        ['lng' => -2.5794255, 'lat' => 51.4410208],
        ['lng' => -2.5794148, 'lat' => 51.4409606],
        ['lng' => -2.5792056, 'lat' => 51.441091],
        ['lng' => -2.5791758, 'lat' => 51.4411597],
        ['lng' => -2.5790792, 'lat' => 51.4411765],
        ['lng' => -2.5789827, 'lat' => 51.4412901],
        ['lng' => -2.5792294, 'lat' => 51.4411965],
        ['lng' => -2.5792938, 'lat' => 51.4412366],
        ['lng' => -2.5791256, 'lat' => 51.4413235],
        ['lng' => -2.5791015, 'lat' => 51.4413369],
        ['lng' => -2.5791229, 'lat' => 51.4413536],
        ['lng' => -2.5790183, 'lat' => 51.4413987],
        ['lng' => -2.5789749, 'lat' => 51.4413919] 
    ],

    [
        ['lng' => -2.5782715, 'lat' => 51.4416983],
        ['lng' => -2.57836, 'lat' => 51.4416698],
        ['lng' => -2.5784525, 'lat' => 51.4416356],
        ['lng' => -2.5785343, 'lat' => 51.4416063],
        ['lng' => -2.5786322, 'lat' => 51.4415687],
        ['lng' => -2.5786429, 'lat' => 51.4415327],
        ['lng' => -2.5786242, 'lat' => 51.441501],
        ['lng' => -2.5785759, 'lat' => 51.4414675],
        ['lng' => -2.5785397, 'lat' => 51.4414483],
        ['lng' => -2.5784793, 'lat' => 51.4414107],
        ['lng' => -2.578431, 'lat' => 51.4413773],
        ['lng' => -2.5783881, 'lat' => 51.4413764],
        ['lng' => -2.5783626, 'lat' => 51.4414057],
        ['lng' => -2.5783345, 'lat' => 51.441404],
        ['lng' => -2.5783023, 'lat' => 51.4414383],
        ['lng' => -2.5782715, 'lat' => 51.4414324],
        ['lng' => -2.578258, 'lat' => 51.4414374],
        ['lng' => -2.5782393, 'lat' => 51.4414308],
        ['lng' => -2.5782178, 'lat' => 51.4414408],
        ['lng' => -2.578191, 'lat' => 51.4414324],
        ['lng' => -2.5781762, 'lat' => 51.4414408],
        ['lng' => -2.5781494, 'lat' => 51.4414291],
        ['lng' => -2.5780569, 'lat' => 51.4414893],
        ['lng' => -2.5780596, 'lat' => 51.4415929],
        ['lng' => -2.5779067, 'lat' => 51.4416046],
        ['lng' => -2.5778718, 'lat' => 51.4416071],
        ['lng' => -2.5778785, 'lat' => 51.4416255],
        ['lng' => -2.5779268, 'lat' => 51.4416506],
        ['lng' => -2.5779764, 'lat' => 51.4416673],
        ['lng' => -2.5780046, 'lat' => 51.4416623],
        ['lng' => -2.5780408, 'lat' => 51.4416891],
        ['lng' => -2.5781078, 'lat' => 51.4416999],
        ['lng' => -2.5781534, 'lat' => 51.4417041],
        ['lng' => -2.5782715, 'lat' => 51.4416983]
    ],

    [
        ['lng' => -2.5782254, 'lat' => 51.4419564],
        ['lng' => -2.5786224, 'lat' => 51.4417215],
        ['lng' => -2.578609, 'lat' => 51.4417123],
        ['lng' => -2.578157, 'lat' => 51.4418636],
        ['lng' => -2.5782254, 'lat' => 51.4419564]
    ],

    [
        ['lng' => -2.581533, 'lat' => 51.4409789],
        ['lng' => -2.5814096, 'lat' => 51.4408636],
        ['lng' => -2.5812433, 'lat' => 51.440805],
        ['lng' => -2.5811628, 'lat' => 51.4407867],
        ['lng' => -2.5809965, 'lat' => 51.4408034],
        ['lng' => -2.580782, 'lat' => 51.4408351],
        ['lng' => -2.5805942, 'lat' => 51.4408853],
        ['lng' => -2.5803796, 'lat' => 51.4409555],
        ['lng' => -2.5800551, 'lat' => 51.4410843],
        ['lng' => -2.5796232, 'lat' => 51.4412715],
        ['lng' => -2.5794757, 'lat' => 51.4413551],
        ['lng' => -2.5794569, 'lat' => 51.4414186],
        ['lng' => -2.5794784, 'lat' => 51.4414738],
        ['lng' => -2.5795294, 'lat' => 51.4414972],
        ['lng' => -2.5795964, 'lat' => 51.4414939],
        ['lng' => -2.5797949, 'lat' => 51.4413952],
        ['lng' => -2.5801624, 'lat' => 51.4412548],
        ['lng' => -2.5805513, 'lat' => 51.4411194],
        ['lng' => -2.5808839, 'lat' => 51.4410107],
        ['lng' => -2.581026, 'lat' => 51.4409722],
        ['lng' => -2.5811709, 'lat' => 51.4409672],
        ['lng' => -2.5814364, 'lat' => 51.4409756],
        ['lng' => -2.581533, 'lat' => 51.4409789]
    ],

    [
        ['lng' => -2.5773243, 'lat' => 51.441507],
        ['lng' => -2.5773351, 'lat' => 51.441492],
        ['lng' => -2.5771473, 'lat' => 51.4414351],
        ['lng' => -2.577032, 'lat' => 51.4413917],
        ['lng' => -2.5768067, 'lat' => 51.4413298],
        ['lng' => -2.5765948, 'lat' => 51.4412529],
        ['lng' => -2.5763346, 'lat' => 51.4411593],
        ['lng' => -2.5763239, 'lat' => 51.4411309],
        ['lng' => -2.5763587, 'lat' => 51.441064],
        ['lng' => -2.5765089, 'lat' => 51.4410456],
        ['lng' => -2.5765599, 'lat' => 51.4409837],
        ['lng' => -2.5767074, 'lat' => 51.440952],
        ['lng' => -2.577268, 'lat' => 51.4411392],
        ['lng' => -2.5772707, 'lat' => 51.4411091],
        ['lng' => -2.5766806, 'lat' => 51.4409135],
        ['lng' => -2.5764177, 'lat' => 51.4410188],
        ['lng' => -2.5762005, 'lat' => 51.4410957],
        ['lng' => -2.5762032, 'lat' => 51.4411309],
        ['lng' => -2.5765894, 'lat' => 51.4412863],
        ['lng' => -2.5768388, 'lat' => 51.4413716],
        ['lng' => -2.5773243, 'lat' => 51.441507]
    ]


];

?>
