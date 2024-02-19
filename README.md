# ProjecteActCohesio


GESTIO
Inici de sessió: S’iniciarà la sessió per google i aleshores et redirigirà a la pàgina del grup corresponent 

Grups d’alumnes: Llistat alumnes(Seleccionar quins alumnes), tutor de cada grup
Els grups d’alumnes son basats en les classes d’alumnes (per exemple: DAW1, DAW2, etc…). Els grups tindran com a màxim 15 persones, d'aquí endavant es creara un altre grup diferent. En cas de no tenir un nombre de grups parells, s'avisa de que no son parells i es dona la opció de crear un grup vuit i afegir-hi alumnes manualment.

Proves: Quantitat, quines, base de dades amb: Nom i descr, lloc(mapa), material, Professor 
Les proves constaran de les següents dades: Nom, descripció, lloc, material. Existeix una llista de proves, i segons el nombre de grups s'agafa un nombre de proves o un altre (si son 14 grups, s'agafen 7 proves).
Possibles proves: Fútbol, Balon Prisionero, Futbolín, Pañuelo, Bancos, Ping Pong, Piramides, Preguntas canciones,  Juegos Mentales, Palo de Bambú, Dibujo Conjunto, Basket,
El número de pruebas tienen que ser impar
Materials:
Fútbol: Una pilota de fútbol
Mocador: Un mocador
Ping Pong: 6 paletes i 3 pilotes petites
Basket: Pilota de bàsquet
Futbolín: Dues pilotes de futbolín
Piramides: Dos sets de peces de fusta
Preguntas canciones: Clase buida
Palo de Bambú: Dos pals de bambú
Balón prisionero: Dos bolas de balón prisionero y varios conos
Dibujo Conjunto: 50 papers i 15 llapis

Ordre: Quins dos grups participen
Per fer que els grups puguin jugar a totes les activitats i s'enfrontin contra nous grups en cada joc, es fa servir una llista bidimensional (dos columnes, una puja una altra baixa). Segons si el grup es de la primera meitat o de la segona meitat, al acabar una partida, puja i l’altre baixarà. Per exemple, el grup A s'enfronta amb el grup F, al acabar, el A baixa i el F puja. D’aquesta manera, el A s'enfrentava contra el H i el F contra el D.
A -> B -> C -> D -> E		E -> A -> B -> C -> D
F <- G <- H <- I <- J		G <- H <- I <- J <- F

Puntuació ()
Per cada victoria el grup guanyara 1 punt i per cada empat 0,5 cada grup.
Primer entra en la llista de grups, després anirà a la llista d'alumnes i aquí on es generen els grups dels alumnes. Després anirem a la llista de grups, on es podran veure els alumnes allistats als grups corresponents i podràs modificar els grups anant a la pàgina on la seva utilitat serà ajuntar els alumnes en grups i posar tantes proves com meitat del total de grups generats


# Requisits d'entorn
- PHP 8.2.4
- MariaDB x.x.x
- Apache2 x.x.x