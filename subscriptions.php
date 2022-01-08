<?php
    require_once ("./htmlgenerator.php");
    include_once('php\includes\session_start.inc.php');

    function showALlCountries() {
        $countries = [
            "Afghanistan",
            "Albania",
            "Algeria",
            "American Samoa",
            "Andorra",
            "Angola",
            "Anguilla",
            "Antarctica",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Aruba",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas (the)",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bermuda",
            "Bhutan",
            "Bolivia (Plurinational State of)",
            "Bonaire, Sint Eustatius and Saba",
            "Bosnia and Herzegovina",
            "Botswana",
            "Bouvet Island",
            "Brazil",
            "British Indian Ocean Territory (the)",
            "Brunei Darussalam",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cabo Verde",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Cayman Islands (the)",
            "Central African Republic (the)",
            "Chad",
            "Chile",
            "China",
            "Christmas Island",
            "Cocos (Keeling) Islands (the)",
            "Colombia",
            "Comoros (the)",
            "Congo (the Democratic Republic of the)",
            "Congo (the)",
            "Cook Islands (the)",
            "Costa Rica",
            "Croatia",
            "Cuba",
            "Curaçao",
            "Cyprus",
            "Czechia",
            "Côte d'Ivoire",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic (the)",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Eswatini",
            "Ethiopia",
            "Falkland Islands (the) [Malvinas]",
            "Faroe Islands (the)",
            "Fiji",
            "Finland",
            "France",
            "French Guiana",
            "French Polynesia",
            "French Southern Territories (the)",
            "Gabon",
            "Gambia (the)",
            "Georgia",
            "Germany",
            "Ghana",
            "Gibraltar",
            "Greece",
            "Greenland",
            "Grenada",
            "Guadeloupe",
            "Guam",
            "Guatemala",
            "Guernsey",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Heard Island and McDonald Islands",
            "Holy See (the)",
            "Honduras",
            "Hong Kong",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran (Islamic Republic of)",
            "Iraq",
            "Ireland",
            "Isle of Man",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jersey",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Korea (the Democratic People's Republic of)",
            "Korea (the Republic of)",
            "Kuwait",
            "Kyrgyzstan",
            "Lao People's Democratic Republic (the)",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Macao",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands (the)",
            "Martinique",
            "Mauritania",
            "Mauritius",
            "Mayotte",
            "Mexico",
            "Micronesia (Federated States of)",
            "Moldova (the Republic of)",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Montserrat",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands (the)",
            "New Caledonia",
            "New Zealand",
            "Nicaragua",
            "Niger (the)",
            "Nigeria",
            "Niue",
            "Norfolk Island",
            "Northern Mariana Islands (the)",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestine, State of",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines (the)",
            "Pitcairn",
            "Poland",
            "Portugal",
            "Puerto Rico",
            "Qatar",
            "Republic of North Macedonia",
            "Romania",
            "Russian Federation (the)",
            "Rwanda",
            "Réunion",
            "Saint Barthélemy",
            "Saint Helena, Ascension and Tristan da Cunha",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Martin (French part)",
            "Saint Pierre and Miquelon",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Sint Maarten (Dutch part)",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Georgia and the South Sandwich Islands",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan (the)",
            "Suriname",
            "Svalbard and Jan Mayen",
            "Sweden",
            "Switzerland",
            "Syrian Arab Republic",
            "Taiwan",
            "Tajikistan",
            "Tanzania, United Republic of",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tokelau",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Turks and Caicos Islands (the)",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates (the)",
            "United Kingdom of Great Britain and Northern Ireland (the)",
            "United States Minor Outlying Islands (the)",
            "United States of America (the)",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Venezuela (Bolivarian Republic of)",
            "Viet Nam",
            "Virgin Islands (British)",
            "Virgin Islands (U.S.)",
            "Wallis and Futuna",
            "Western Sahara",
            "Yemen",
            "Zambia",
            "Zimbabwe",
            "Åland Islands"
        ];
        $html = null;

        foreach ($countries as $country) {
            $html .= <<<HTML
                <option value="$country">{$country}</option>
            HTML;
        }

        return $html;
    }

    if(isset($_POST['submit'])) {
        $_SESSION['subscription'] = $_POST['subscription'];
        header("location: register.php");
    }
?>

<?php require_once("./layouts/head.php"); ?>

<body class="body">
    <?php require_once("./layouts/header.php"); ?>

    <main class="main main--form">
        <form method="POST">
            <div class="abonnement abonnement--grid">
                <article class="abonnement__card">
                    <h2 class="abonnement__title">
                        Standard
                    </h2>

                    <div class="abonnement__geld">
                        50 &euro;
                    </div>

                    <div class="abonnement__detail abonnement__detail--margin">
                        <div>HD</div>
                        <div class="abonnement__detail--flex-end">&#10004;</div>
                    </div>
                    <div class="abonnement__detail">
                        <div>Cancel anytime</div>
                        <div class="abonnement__detail--flex-end">&#10004;</div>
                    </div>
                    <div class="abonnement__radio">
                        <input type="radio" value="Standard" name="subscription" id="Standard">
                    </div>
                </article>
                <article class="abonnement__card">
                    <h2 class="abonnement__title">
                        Ultiem
                    </h2>

                    <div class="abonnement__geld">
                        50 &euro;
                    </div>

                    <div class="abonnement__detail abonnement__detail--margin">
                        <div>HD</div>
                        <div class="abonnement__detail--flex-end">&#10004;</div>
                    </div>
                    <div class="abonnement__detail">
                        <div>Cancel anytime</div>
                        <div class="abonnement__detail--flex-end">&#10004;</div>
                    </div>
                    <div class="abonnement__radio">
                        <input type="radio" value="Ultiem" name="subscription" id="Standard">
                    </div>
                </article>
                <article class="abonnement__card">
                    <h2 class="abonnement__title">
                        Pro
                    </h2>

                    <div class="abonnement__geld">
                        50 &euro;
                    </div>

                    <div class="abonnement__detail abonnement__detail--margin">
                        <div>HD</div>
                        <div class="abonnement__detail--flex-end">&#10004;</div>
                    </div>
                    <div class="abonnement__detail">
                        <div>Cancel anytime</div>
                        <div class="abonnement__detail--flex-end">&#10004;</div>
                    </div>
                    <div class="abonnement__radio">
                        <input type="radio" value="Pro" name="subscription" id="Standard">
                    </div>
                </article>
            </div>

            <div class="abonnement__flex abonnement__flex--center">
                <input type="submit" class="abonnement__button abonnement__button--red" name="submit" value="Next">
            </div>
        </form>
    </main>
    <?php require_once("./layouts/footer.php"); ?>
</body>

</html>
