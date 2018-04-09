<?php

use App\Circle;
use Illuminate\Database\Seeder;

class BigBuildingCircleSeeder extends Seeder
{
    private $storage = 'circles';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->circles as $title => $data) {
            $image = $data[1] ? $this->storage . '/' . $data[1] : null;
            factory(Circle::class)->create([
                'title' => $title,
                'webpage' => $data[0],
                'image' => $image,
            ]);
        }
    }

    private $circles = [
      'Alledaags' => ['https://www.alledaags.nl/nl', 'alledaags.png' ],
      'Alles Media' => ['https://www.allesmedia.nl/', null ],
      'Almanapp' => ['https://www.almanapp.nl/', 'AlmanappLogo.png' ],
      'Arbeidsvit' => ['http://www.arbeidsvit.nl/', null ],
      'Black & Bloom' => ['http://blackandbloom.nl/', 'blacknbloom.png' ],
      'Blockchaingers' => ['https://blockchaingers.org/', 'blockchaingers.png' ],
      'Brouwbroeders' => ['http://www.brouwbroeders.nl/', 'brouwbroeders.png' ],
      'Bouwme.nu' => ['http://www.bouwme.nu/', 'bouwmenu.png' ],
      'Classi' => ['https://classi.nl/', 'classi.png' ],
      'Clogish' => ['https://twitter.com/clogish', 'Clogish1.png' ],
      'Coders Academy' => ['https://codersacademy.nl/', 'codersacademy.png' ],
      'CodeGorilla' => ['https://www.codegorilla.nl/', 'codegorilla.png' ],
      'David Vroom Photography' => ['http://www.davidvroom.nl/', 'davidvroom.png' ],
      'Devhouse Spindle' => ['https://wearespindle.com/', 'DevhouseSpindle.png' ],
      'DinnerStories' => ['https://dinner-stories.nl/', 'dinnerstories.png' ],
      'Digital Office Groningen' => ['https://www.groningendigitalcity.com/digital-office-groningen/', 'digitalofficegroningen.png' ],
      'Dorstlust' => ['https://dorstlust.nl/', 'dorstlust.png' ],
      'DutchChain' => ['https://www.dutchchain.com/', 'dutchchain.png' ],
      'DUBISTR' => ['http://www.dubistr.nl/', 'dubistr.png' ],
      'Eclipse Incubators Foundation' => ['http://incubatorsfoundation.com/', 'eclipseincubators.png' ],
      'Eetlust' => ['http://wijhebbeneetlust.nl/', 'EetlustLogo.png' ],
      'Elgentos' => ['https://elgentos.nl/', 'ElgentosLogo.png' ],
      'Filmcollectief' => ['http://www.filmcollectiefgroningen.nl/', null ],
      'Fitgaaf' => ['https://www.fitgaaf.nl/', 'fitgaaf.png' ],
      'Flow In Motion' => ['https://www.flowinmotion.com/', 'flowinmotion.png' ],
      'Giso Spijkerman' => ['http://gisospijkerman.nl/', 'giso.png' ],
      'De Groningse Uitdaging' => ['http://groningseuitdaging.nl/', 'degroningseuitdaging.png' ],
      'HartHoud' => ['https://www.harthoud.nl/', 'harthoud.png' ],
      'IIWII' => ['https://www.facebook.com/iiwii.bar/', null ],
      'Jellow' => ['https://www.jellow.nl/', 'Jellow.png' ],
      'Jimmy’s' => ['http://www.jimmys050.nl/', 'JimmysLogo.png' ],
      'Marieke Verdijk Video' => ['http://www.mariekeverdijk.nl', null ],
      'McMahon Consulting' => ['', null ],
      'Marieke Bossina' => ['http://mariekebossina.nl/', null ],
      'Mutant Worm' => ['https://www.mutantworm.com/', 'MutantWormLogo.png' ],
      'Loabb' => ['https://loabb.nl/', null ],
      'Nee heb je, Jesse kan je krijgen' => ['http://www.jesseschaap.nl/', 'Jesse.png' ],
      'NESK' => ['http://nesk.nl/', 'NeskLogo.jpg' ],
      'Plus 3150' => ['http://www.plus3150.nl/', 'Plus3150.jpg' ],
      'Prima Focus' => ['https://www.primafocus.nl/', null ],
      'Pontonniers' => ['http://www.pontonniers.com/nl/', null ],
      'P. Pietens' => ['http://patrickpietens.com/', null ],
      'Qwoty' => ['http://www.qwoty.com/', null ],
      'Rabobank' => ['https://www.rabobank.nl/particulieren/', null ],
      'Reinlab' => ['https://www.reinlab.nl/', 'Rein.png' ],
      'RR Maritime Engineering' => ['http://rrmaritimeengineering.com/', null ],
      'Salesqualifiedlead' => ['http://www.salesqualifiedlead.nl/', null ],
      'Smart Ranking' => ['https://smartranking.nl/', null ],
      'Smaak van Stad' => ['http://www.desmaakvanstad.nl/', null ],
      'Scripta Communicatie' => ['https://www.scriptacommunicatie.nl/', null ],
      'Screw-Up' => ['http://www.screwup.nl/', null ],
      'Slow-hand netwerk' => ['http://www.slow-hand.nl/', null ],
      'Sound Appraisal' => ['https://soundappraisal.eu/', null ],
      'Stichting Maakplek' => ['http://www.maakplek.nl/', null ],
      'Stichting NoordBaak' => ['http://www.noordbaak.nl/', null ],
      'Stichting Groningse Uitdaging' => ['http://groningseuitdaging.nl/contact/', null ],
      'Stichting The Big Building' => ['https://thebigbuilding.com/', null ],
      'Stichting Terug naar het begin' => ['http://terugnaarhetbegin.nl/', null ],
      'Studio Neon' => ['https://www.facebook.com/Studio-NEON-122697985159052/', null ],
      'Studio Bronts' => ['http://www.studiobronts.com/', 'StudioBronts.png' ],
      'Thesis 1' => ['http://www.thesisone.com/', 'ThesisOneLogo.png' ],
      'Thomas Schrijft' => ['https://www.thomasschrijft.nl', null ],
      'Tubbber' => ['https://www.tubbber.com/nl/', null ],
      'UpToUs' => ['http://uptous.nl/', 'UpToUsLogo.png' ],
      'VaVersa' => ['https://vaversa.com/', null ],
      'Van Hulley' => ['https://www.vanhulley.nl/welkom', 'VanHulley.png' ],
      'Ideeënjagers (Van Wijnen)' => ['https://ideeenjager.nl/', null ],
      'VoipGrid' => ['https://voipgrid.nl/', null ],
      'Wecademy' => ['https://www.wecademy.nl/', null ],
      'WAT' => ['https://www.facebook.com/WATgroningen/', null ],
   ];

}
