<?php

use App\Circle;
use Illuminate\Database\Seeder;

class BigBuildingCircleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->circles as $title => $url) {
            factory(Circle::class)->create([
                'title' => $title,
                'webpage' => $url,
            ]);
        }
    }

    private $circles = [
      'Alledaags' => 'https://www.alledaags.nl/nl',
      'Alles Media' => 'https://www.allesmedia.nl/',
      'Almanapp' => 'https://www.almanapp.nl/',
      'Arbeidsvit' => 'http://www.arbeidsvit.nl/',
      'Black & Bloom' => 'http://blackandbloom.nl/',
      'Blockchaingers' => 'https://blockchaingers.org/',
      'Brouwbroeders' => 'http://www.brouwbroeders.nl/',
      'Bouwme.nu' => 'http://www.bouwme.nu/',
      'Classi' => 'https://classi.nl/',
      'Clogish' => 'https://twitter.com/clogish',
      'Coders Academy' => 'https://codersacademy.nl/',
      'CodeGorilla' => 'https://www.codegorilla.nl/',
      'David Vroom Photography' => 'http://www.davidvroom.nl/',
      'Devhouse Spindle' => 'https://wearespindle.com/',
      'DinnerStories' => 'https://dinner-stories.nl/',
      'Digital Office Groningen' => 'https://www.groningendigitalcity.com/digital-office-groningen/',
      'Dorstlust' => 'https://dorstlust.nl/',
      'DutchChain' => 'https://www.dutchchain.com/',
      'DUBISTR' => 'http://www.dubistr.nl/',
      'Eclipse Incubators Foundation' => 'http://incubatorsfoundation.com/',
      'Eetlust' => 'http://wijhebbeneetlust.nl/',
      'Elgentos' => 'https://elgentos.nl/',
      'Filmcollectief' => 'http://www.filmcollectiefgroningen.nl/',
      'Fitgaaf' => 'https://www.fitgaaf.nl/',
      'Flow In Motion' => 'https://www.flowinmotion.com/',
      'Giso Spijkerman' => 'http://gisospijkerman.nl/',
      'De Groningse Uitdaging' => 'http://groningseuitdaging.nl/',
      'HartHoud' => 'https://www.harthoud.nl/',
      'IIWII' => 'https://www.facebook.com/iiwii.bar/',
      'Jellow' => 'https://www.jellow.nl/',
      'Jimmy’s' => 'http://www.jimmys050.nl/',
      'Marieke Verdijk Video' => 'http://www.mariekeverdijk.nl',
      'McMahon Consulting' => '',
      'Marieke Bossina' => 'http://mariekebossina.nl/',
      'Mutant Worm' => 'https://www.mutantworm.com/',
      'Loabb' => 'https://loabb.nl/',
      'Nee heb je, Jesse kan je krijgen' => 'http://www.jesseschaap.nl/',
      'NESK' => 'http://nesk.nl/',
      'Plus 3150' => 'http://www.plus3150.nl/',
      'Prima Focus' => 'https://www.primafocus.nl/',
      'Pontonniers' => 'http://www.pontonniers.com/nl/',
      'P. Pietens' => 'http://patrickpietens.com/',
      'Qwoty' => 'http://www.qwoty.com/',
      'Rabobank' => 'https://www.rabobank.nl/particulieren/',
      'Reinlab' => 'https://www.reinlab.nl/',
      'RR Maritime Engineering' => 'http://rrmaritimeengineering.com/',
      'Salesqualifiedlead' => 'http://www.salesqualifiedlead.nl/',
      'Smart Ranking' => 'https://smartranking.nl/',
      'Smaak van Stad' => 'http://www.desmaakvanstad.nl/',
      'Scripta Communicatie' => 'https://www.scriptacommunicatie.nl/',
      'Screw-Up' => 'http://www.screwup.nl/',
      'Slow-hand netwerk' => 'http://www.slow-hand.nl/',
      'Sound Appraisal' => 'https://soundappraisal.eu/',
      'Stichting Maakplek' => 'http://www.maakplek.nl/',
      'Stichting NoordBaak' => 'http://www.noordbaak.nl/',
      'Stichting Groningse Uitdaging' => 'http://groningseuitdaging.nl/contact/',
      'Stichting The Big Building' => 'https://thebigbuilding.com/',
      'Stichting Terug naar het begin' => 'http://terugnaarhetbegin.nl/',
      'Studio Neon' => 'https://www.facebook.com/Studio-NEON-122697985159052/',
      'Studio Bronts' => 'http://www.studiobronts.com/',
      'Thesis 1' => 'http://www.thesisone.com/',
      'Thomas Schrijft' => 'https://www.thomasschrijft.nl',
      'Tubbber' => 'https://www.tubbber.com/nl/',
      'UpToUs' => 'http://uptous.nl/',
      'VaVersa' => 'https://vaversa.com/',
      'Van Hulley' => 'https://www.vanhulley.nl/welkom',
      'Ideeënjagers (Van Wijnen)' => 'https://ideeenjager.nl/',
      'VoipGrid' => 'https://voipgrid.nl/',
      'Wecademy' => 'https://www.wecademy.nl/',
      'WAT' => 'https://www.facebook.com/WATgroningen/',
   ];

}
