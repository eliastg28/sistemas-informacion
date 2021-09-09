INSERT INTO
  `students` (
    `id`,
    `name`,
    `surname`,
    `email`,
    `gender`,
    `birth`
  )
VALUES
  (
    1,
    'Manuel Jesus',
    'Quispe Chavez',
    'mjquispe@unitru.edu.pe',
    'M',
    '1999-10-01'
  ),
  (
    2,
    'Jose Sebastian',
    'Arce Machuca',
    'jarcem@unitru.edu.pe',
    'M',
    '2001-06-15'
  ),
  (
    3,
    'Kevin Yair',
    'Vilca Quispe',
    'kvilca@unitru.edu.pe',
    'M',
    '2001-09-22'
  ),
  (
    4,
    'Jose Wladimir',
    'Esquen Quiroz',
    'jesquenq@unitru.edu.pe',
    'M',
    '2001-06-15'
  ),
  (
    5,
    'Luis Alberto',
    'Albarran Jara',
    'lalbarran@unitru.edu.pe',
    'M',
    '2001-10-04'
  ),
  (
    6,
    'Stephanie Carolina',
    'Cabrera Honorio',
    'scabrerah@unitru.edu.pe',
    'F',
    '1999-03-22'
  ),
  (
    7,
    'Alexander Javier',
    'Sanchez Valdez',
    'asanchezv@unitru.edu.pe',
    'M',
    '1998-03-23'
  ),
  (
    8,
    'Jonel Albert',
    'Correa Cotrina',
    'jcotrinac@unitru.edu.pe',
    'M',
    '1999-11-22'
  ),
  (
    9,
    'Carlos Piero Junior',
    'Merino Carpio',
    'cmerino@unitru.edu.pe',
    'M',
    '1997-06-07'
  ),
  (
    10,
    'Alex Marcelino',
    'Silva Eneque',
    'asilvae@unitru.edu.pe',
    'M',
    '2001-09-21'
  ),
  (
    11,
    'Jose Alberto',
    'Quiroz Gamarra',
    'jquirozg@unitru.edu.pe',
    'M',
    '1999-01-18'
  ),
  (
    12,
    'Lucy Marbella',
    'Portilla Ninaquipe',
    'lportilla@unitru.edu.pe',
    'F',
    '2002-07-31'
  ),
  (
    13,
    'Renato Martin',
    'Nuñez Ortiz',
    'munezo@unitru.edu.pe',
    'M',
    '2001-06-15'
  ),
  (
    14,
    'Willian Samuel',
    'Miranda Huaman',
    'wmiranda@unitru.edu.pe',
    'M',
    '2000-11-16'
  ),
  (
    15,
    'Jessica Antonella',
    'Vasquez Saavedra',
    'javasquezs@unitru.edu.pe',
    'F',
    '2001-09-19'
  ),
  (
    16,
    'GianMarco',
    'Vasquez Villoslada',
    'gvasquezv@unitru.edu.pe',
    'M',
    '2001-08-28'
  ),
  (
    17,
    'Jhon Eduardo',
    'Vargas Villar',
    'jevargasv@unitru.edu.pe',
    'M',
    '2001-08-09'
  ),
  (
    18,
    'Maria del Carmen',
    'Cerna Azcarate',
    'macerna@unitru.edu.pe',
    'F',
    '2002-06-27'
  ),
  (
    19,
    'Elias Samuel',
    'Tantalean Gil',
    'etantaleang@unitru.edu.pe',
    'M',
    '1999-07-28'
  ),
  (
    20,
    'Angel Martin',
    'Amaya Cruz',
    'anamayac@unitru.edu.pe',
    'M',
    '2000-11-22'
  ),
  (
    21,
    'Irvin Jhosep',
    'Ventura Javier',
    'iventura@unitru.edu.pe',
    'M',
    '2001-04-19'
  ),
  (
    22,
    'David Fernando',
    'Zeniz Ramos',
    'dzeniz@unitru.edu.pe',
    'M',
    '2001-02-15'
  ),
  (
    23,
    'Juan David',
    'Morales Paredes',
    'jmoralesp@unitru.edu.pe',
    'M',
    '2001-06-15'
  ),
  (
    24,
    'Juan José',
    'Yamunaque Castillo',
    'jyamunaquec@unitru.edu.pe',
    'M',
    '2001-06-15'
  ),
  (
    25,
    'Nelmarie Marshel Tatiana',
    'Sanchez Vigo',
    'nsanchezv@unitru.edu.pe',
    'F',
    '2000-02-22'
  ),
  (
    26,
    'Edwin Anthony',
    'Silva Izquierdo',
    'esilvai@unitru.edu.pe',
    'M',
    '1997-03-15'
  ),
  (
    27,
    'Piero Sebastian',
    'Hernandez Gomez',
    'phernandezg@unitru.edu.pe',
    'M',
    '1996-05-15'
  ),
  (
    28,
    'Keyko Clesehisy',
    'Chavez Quintana',
    'kchavezq@unitru.edu.pe',
    'F',
    '2000-02-07'
  ),
  (
    29,
    'Jampierre Bryan',
    'Amaya Culqui',
    'jamayac@unitru.edu.pe',
    'M',
    '1999-11-04'
  );
INSERT INTO
  `users` (`id`, `name`, `email`, `password`, `student_id`)
VALUES
  (
    1,
    'Manuel Jesus Quispe Chavez',
    'mjquispe@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    1
  ),
  (
    2,
    'Jose Sebastian Arce Machuca',
    'jarcem@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    2
  ),
  (
    3,
    'Kevin Yair Vilca Quispe',
    'kvilca@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    3
  ),
  (
    4,
    'Jose Wladimir Esquen Quiroz',
    'jesquenq@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    4
  ),
  (
    5,
    'Luis Alberto Albarran Jara',
    'lalbarran@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    5
  ),
  (
    6,
    'Stephanie Carolina Cabrera Honorio',
    'scabrerah@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    6
  ),
  (
    7,
    'Alexander Javier Sanchez Valdez',
    'asanchezv@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    7
  ),
  (
    8,
    'Jonel Albert Correa Cotrina',
    'jcotrinac@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    8
  ),
  (
    9,
    'Carlos Piero Junior Merino Carpio',
    'cmerino@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    9
  ),
  (
    10,
    'Alex Marcelino Silva Eneque',
    'asilvae@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    10
  ),
  (
    11,
    'Jose Alberto Quiroz Gamarra',
    'jquirozg@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    11
  ),
  (
    12,
    'Lucy Marbella Portilla Ninaquipe',
    'lportilla@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    12
  ),
  (
    13,
    'Renato Martin Nuñez Ortiz',
    'munezo@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    13
  ),
  (
    14,
    'Willian Samuel Miranda Huaman',
    'wmiranda@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    14
  ),
  (
    15,
    'Jessica Antonella Vasquez Saavedra',
    'javasquezs@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    15
  ),
  (
    16,
    'GianMarco Vasquez Villoslada',
    'gvasquezv@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    16
  ),
  (
    17,
    'Jhon Eduardo Vargas Villar',
    'jevargasv@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    17
  ),
  (
    18,
    'Maria del Carmen Cerna Azcarate',
    'macerna@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    18
  ),
  (
    19,
    'Elias Samuel Tantalean Gil',
    'etantaleang@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    19
  ),
  (
    20,
    'Angel Martin Amaya Cruz',
    'anamayac@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    20
  ),
  (
    21,
    'Irvin Jhosep Ventura Javier',
    'iventura@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    21
  ),
  (
    22,
    'David Fernando Zeniz Ramos',
    'dzeniz@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    22
  ),
  (
    23,
    'Juan David Morales Paredes',
    'jmoralesp@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    23
  ),
  (
    24,
    'Juan José Yamunaque Castillo',
    'jyamunaquec@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    24
  ),
  (
    25,
    'Nelmarie Marshel Tatiana Sanchez Vigo',
    'nsanchezv@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    25
  ),
  (
    26,
    'Edwin Anthony Silva Izquierdo',
    'esilvai@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    26
  ),
  (
    27,
    'Piero Sebastian Hernandez Gomez',
    'phernandezg@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    27
  ),
  (
    28,
    'Keyko Clesehisy Chavez Quintana',
    'kchavezq@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    28
  ),
  (
    29,
    'Jampierre Bryan Amaya Culqui',
    'jamayac@unitru.edu.pe',
    '$2y$10$KKWey6ZFCKmeC4jNMDplsu1te8z6cvMBMZM6kYv698a/O7x/0peEK',
    29
  );
