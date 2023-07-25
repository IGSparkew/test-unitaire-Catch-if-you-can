# Consignes
Contexte et demande : Attrape-moi si tu peux

*Attrape-moi si tu peux est un jeu à deux joueurs.*

Les joueurs se déplacent sur une grille de taille 10 sur 10.
Les deux joueurs font une action chacun à leur tour.
À son tour, un joueur peut faire une des actions suivantes :
- Pivoter à gauche de 90° (tourner à gauche)
- Pivoter à droite de 90° (tourner à droite)
- Avancer d’une ou deux cases

Si un joueur avance en dehors du plateau, son déplacement est annulé.

Une fois que les deux joueurs ont fait leur action, le jeu indique si un joueur voit un autre joueur et à quelle distance il se situe (le nombre de cases).

Un joueur ne voit que ce qui se trouve sur la ligne ou la colonne sur laquelle il est orienté.
Ensuite, une nouvelle phase de jeu commence et les joueurs peuvent à nouveau choisir une des trois actions.
Pour gagner, un joueur doit se déplacer sur la même case que l’autre joueur.


Essayez de réaliser ce jeu en TDD.

---

### 1- Initialiser les joueurs &check;
- Test pour check qu'ils existent - ROUGE
- Écrire le code
- Création des joueurs + positions 0/0 à l'opposé
- Modification de la fonction de test - VERT
---

### 2- Création de la grille &cross;
- Test pour voir la taille de la grille - ROUGE
- Écrire le code
- Boucle + nested ?
- Modification de la fonction de test - VERT

---

### 3- Tour du joueur ? &cross;
- Test pour voir si c'est le tour du joueur - ROUGE
- Écrire le code
- Choisir une action ?
- Modification de la fonction de test - VERT

---

### 4- Action du joueur - Tourner à droite de 90° &cross;
- Test pour check que le joueur tourne à droite - ROUGE
- Écrire le code
- If/Else ?
- Modification de la fonction de test - VERT

---

### 5- Action du joueur - Tourner à gauche de 90° &cross;
- Test pour check que le joueur tourne à gauche - ROUGE
- Écrire le code
- If/Else ?
- Modification de la fonction de test - VERT

---

### 6- Action du joueur - Avancer de deux cases &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- Mettre à jour les positions
- Modification de la fonction de test - VERT

---

### 7- Action du joueur - Avancer d'une case &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- Mettre à jour les positions
- Modification de la fonction de test - VERT

---

### 8- Action du joueur - Vérification que le joueur est encore dans la grille &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- If/Else ? En lien avec les deux fonctions précédentes ? Déplacement annulé si en dehors
- Modification de la fonction de test - VERT

---

### 9- Après l'action du joueur - Est-ce qu'il voit l'autre joueur ? &cross;
- Test pour check que l'un des joueur voit l'autre - ROUGE
- Écrire le code
- Vérifier la position des joueurs et vérifier sur colonne/ligne si l'un voit l'autre ou pas
- Modification de la fonction de test - VERT

---

### 10- Fin de partie &cross;
- Test pour check que les deux joueurs ont fait leur actions - ROUGE
- Écrire le code
- Fin et on recommence
... (15 lignes restantes)# Consignes
Contexte et demande : Attrape-moi si tu peux

*Attrape-moi si tu peux est un jeu à deux joueurs.*

Les joueurs se déplacent sur une grille de taille 10 sur 10.
Les deux joueurs font une action chacun à leur tour.
À son tour, un joueur peut faire une des actions suivantes :
- Pivoter à gauche de 90° (tourner à gauche)
- Pivoter à droite de 90° (tourner à droite)
- Avancer d’une ou deux cases

Si un joueur avance en dehors du plateau, son déplacement est annulé.

Une fois que les deux joueurs ont fait leur action, le jeu indique si un joueur voit un autre joueur et à quelle distance il se situe (le nombre de cases).

Un joueur ne voit que ce qui se trouve sur la ligne ou la colonne sur laquelle il est orienté.
Ensuite, une nouvelle phase de jeu commence et les joueurs peuvent à nouveau choisir une des trois actions.
Pour gagner, un joueur doit se déplacer sur la même case que l’autre joueur.


Essayez de réaliser ce jeu en TDD.

---

### 1- Initialiser les joueurs &check;
- Test pour check qu'ils existent - ROUGE
- Écrire le code
- Création des joueurs + positions 0/0 à l'opposé
- Modification de la fonction de test - VERT
---

### 2- Création de la grille &cross;
- Test pour voir la taille de la grille - ROUGE
- Écrire le code
- Boucle + nested ?
- Modification de la fonction de test - VERT

---

### 3- Tour du joueur ? &cross;
- Test pour voir si c'est le tour du joueur - ROUGE
- Écrire le code# Consignes
Contexte et demande : Attrape-moi si tu peux

*Attrape-moi si tu peux est un jeu à deux joueurs.*

Les joueurs se déplacent sur une grille de taille 10 sur 10.
Les deux joueurs font une action chacun à leur tour.
À son tour, un joueur peut faire une des actions suivantes :
- Pivoter à gauche de 90° (tourner à gauche)
- Pivoter à droite de 90° (tourner à droite)
- Avancer d’une ou deux cases

Si un joueur avance en dehors du plateau, son déplacement est annulé.

Une fois que les deux joueurs ont fait leur action, le jeu indique si un joueur voit un autre joueur et à quelle distance il se situe (le nombre de cases).

Un joueur ne voit que ce qui se trouve sur la ligne ou la colonne sur laquelle il est orienté.
Ensuite, une nouvelle phase de jeu commence et les joueurs peuvent à nouveau choisir une des trois actions.
Pour gagner, un joueur doit se déplacer sur la même case que l’autre joueur.


Essayez de réaliser ce jeu en TDD.

---

### 1- Initialiser les joueurs &check;
- Test pour check qu'ils existent - ROUGE
- Écrire le code
- Création des joueurs + positions 0/0 à l'opposé
- Modification de la fonction de test - VERT
---

### 2- Création de la grille &cross;
- Test pour voir la taille de la grille - ROUGE
- Écrire le code
- Boucle + nested ?
- Modification de la fonction de test - VERT

---

### 3- Tour du joueur ? &cross;
- Test pour voir si c'est le tour du joueur - ROUGE
- Écrire le code
- Choisir une action ?
- Modification de la fonction de test - VERT

---

### 4- Action du joueur - Tourner à droite de 90° &cross;
- Test pour check que le joueur tourne à droite - ROUGE
- Écrire le code
- If/Else ?
- Modification de la fonction de test - VERT

---

### 5- Action du joueur - Tourner à gauche de 90° &cross;
- Test pour check que le joueur tourne à gauche - ROUGE
- Écrire le code
- If/Else ?
- Modification de la fonction de test - VERT

---

### 6- Action du joueur - Avancer de deux cases &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- Mettre à jour les positions
- Modification de la fonction de test - VERT

---

### 7- Action du joueur - Avancer d'une case &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- Mettre à jour les positions
- Modification de la fonction de test - VERT

---

### 8- Action du joueur - Vérification que le joueur est encore dans la grille &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- If/Else ? En lien avec les deux fonctions précédentes ? Déplacement annulé si en dehors
- Modification de la fonction de test - VERT

---

### 9- Après l'action du joueur - Est-ce qu'il voit l'autre joueur ? &cross;
- Test pour check que l'un des joueur voit l'autre - ROUGE
- Écrire le code
- Vérifier la position des joueurs et vérifier sur colonne/ligne si l'un voit l'autre ou pas
- Modification de la fonction de test - VERT

---

### 10- Fin de partie &cross;
- Test pour check que les deux joueurs ont fait leur actions - ROUGE
- Écrire le code
- Fin et on recommence
... (15 lignes restantes)
- Choisir une action ?
- Modification de la fonction de test - VERT

---

### 4- Action du joueur - Tourner à droite de 90° &cross;
- Test pour check que le joueur tourne à droite - ROUGE
- Écrire le code
- If/Else ?
- Modification de la fonction de test - VERT

---

### 5- Action du joueur - Tourner à gauche de 90° &cross;
- Test pour check que le joueur tourne à gauche - ROUGE
- Écrire le code
- If/Else ?
- Modification de la fonction de test - VERT

---

### 6- Action du joueur - Avancer de deux cases &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- Mettre à jour les positions
- Modification de la fonction de test - VERT

---

### 7- Action du joueur - Avancer d'une case &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- Mettre à jour les positions
- Modification de la fonction de test - VERT

---

### 8- Action du joueur - Vérification que le joueur est encore dans la grille &cross;
- Test pour check que le joueur avance - ROUGE
- Écrire le code
- If/Else ? En lien avec les deux fonctions précédentes ? Déplacement annulé si en dehors
- Modification de la fonction de test - VERT

---

### 9- Après l'action du joueur - Est-ce qu'il voit l'autre joueur ? &cross;
- Test pour check que l'un des joueur voit l'autre - ROUGE
- Écrire le code
- Vérifier la position des joueurs et vérifier sur colonne/ligne si l'un voit l'autre ou pas
- Modification de la fonction de test - VERT

---

### 10- Fin de partie &cross;
- Test pour check que les deux joueurs ont fait leur actions - ROUGE
- Écrire le code
- Fin et on recommence
... (15 lignes restantes)



### Command 

``` php .\phpunit-10.2.2.phar .\src\test\GameTest.php ```