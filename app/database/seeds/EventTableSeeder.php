<?php

class EventTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Event::create(array(
			'id' 			=> '1', 
			'title' 			=> 'Petite soirée jeu entre amis et autres!', 
			'description' 	=> 'Description! Description! Description! Description! Petite soirée entre amis et autres!', 
			'event_date' 	=> '2014-05-10',
			'event_time' 	=> '20:30', 
			'max_place' 	=> '14', 
			'current_place' => '7',
			'address_id' 	=> '1'));
		Event::create(array(
			'id' 			=> '2', 
			'title' 			=> 'Une après-midi jeu au bord de la rivière!', 
			'description' 	=> 'Description! Description! Une après-midi jeu au bord de la rivière! Description!', 
			'event_date' 	=> '2014-05-11',
			'event_time' 	=> '20:30', 
			'max_place' 	=> '8', 
			'current_place' => '2',
			'address_id' 	=> '2'));
		Event::create(array(
			'id' 			=> '3', 
			'title' 			=> 'MH370: les enquêteurs auscultent le ventre de la mer', 
			'description' 	=> 'Les recherches pour retrouver l‘épave du Boeing 777 de Malaysia Airlines qui s’est abîmé dans le sud de l’océan Indien se poursuivaient jeudi dans un périmètre réduit autour d’ultrasons détectés à quatre reprises, vraisemblablement émis par ses boîtes noires', 
			'event_date' 	=> '2014-05-12',
			'event_time' 	=> '20:30', 
			'max_place' 	=> '18', 
			'current_place' => '2',
			'address_id' 	=> '3'));
		Event::create(array(
			'id' 			=> '4', 
			'title' 			=> 'Premier meeting officiel pour le Prince George', 
			'description' 	=> 'Et première opération de charme… Le bébé de huit mois a joué avec une dizaine de ses futurs sujets dans la résidence du gouverneur général britannique en Nouvelle-Zélande. ', 
			'event_date' 	=> '2014-05-13',
			'event_time' 	=> '20:30', 
			'max_place' 	=> '5', 
			'current_place' => '2',
			'address_id' 	=> '3'));
		Event::create(array(
			'id' 			=> '5', 
			'title' 			=> 'SNCF et Shoah: Washington veut négocier rapidement avec Paris', 
			'description' 	=> 'Le gouvernement fédéral américain a affirmé mercredi son droit exclusif sur les États fédérés du pays à négocier rapidement avec la France des indemnisations de victimes et familles de victimes de l’Holocauste, aujourd’hui américaines, transportées par la SNCF entre 1942 et 1944.', 
			'event_date' 	=> '2014-05-14',
			'event_time' 	=> '20:30', 
			'max_place' 	=> '9', 
			'current_place' => '2',
			'address_id' 	=> '3'));
		Event::create(array(
			'id' 			=> '6', 
			'title' 			=> 'Christine Lagarde : la croissance est trop faible', 
			'description' 	=> 'À la veille de la réunion de printemps du FMI et de la Banque mondiale, Christine Lagarde évoque sur euronews les grands enjeux actuels, à commencer par la crise en Ukraine et ses conséquences sur l‘économie mondiale.', 
			'event_date' 	=> '2014-05-15',
			'event_time' 	=> '20:30', 
			'max_place' 	=> '3', 
			'current_place' => '2',
			'address_id' 	=> '3'));
		Event::create(array(
			'id' 			=> '7', 
			'title' 			=> 'De la rue à la tranchée', 
			'description' 	=> 'Cette expo souligne l’impact de la geurre sur le quotidien de cette époque. On croise des destins de personnes célèbres comme le poète Wilfrid Owen mais aussi ceux d’hommes de la rue. A l’instar de Matthew Richardson dont l’arrière petit neveu a visité l’exposition.', 
			'event_date' 	=> '2014-05-16',
			'event_time' 	=> '20:30', 
			'max_place' 	=> '11', 
			'current_place' => '2',
			'address_id' 	=> '4'));
	}

}