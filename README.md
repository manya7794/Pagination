# Exercice de Pagination
![image](https://user-images.githubusercontent.com/72400479/160700782-026c5264-cb27-44c7-882e-d683d5c1b365.png)

## Installation
- Téléchargez le projet compressé depuis github
- Installez WampServer ou Xampp selon votre système d'exploitation
- Une fois l'installation de WampServer finie, lancez l'application
- Rendez-vous dans le dossier wamp64 puis dans le dossier www
- Dézipper le projet entier dans le dossier www

## Ajout de la base de données
- Ouvrez votre navigateur web et lancez l'adresse localhost/ ou encore http://127.0.0.1/
- En regardant en bas de la page dans la partie Vos Projets, le dossier __Pagination__ devrait être présent
- Ajoutez ensuite /phpmyadmin/ dans le lien présent dans votre navigateur
- Connectez-vous avec l'identifiant root
- Sur le bandeau central, sélectionnez Base de données
- Créez ensuite une base de données appellée tp1_securite
- Sur le bandeau central, sélectionnez Importer
- Dans le dossier bdd du projet, vous trouverez le fichier technoweb.sql
- Glissez le fichier sur la page ou cliquez sur Choisir un fichier
- Exécutez l'importation via le bouton en base la page

## Pagination
La page index.php permet d'afficher les images présentes dans la base de données. Celles-ci sont affichées sous la forme d'un tableau de taille 2x2 montrant le numéro de l'image dans la base, sa taille et le dossier dans lequel elle se situe.

![image](https://user-images.githubusercontent.com/72400479/159757940-ba8d7e1a-7602-403f-a24e-f0c436e8d7b3.png)

En dessous des images se trouvent la pagination qui permet de naviguer entre les pages. Le nombre de pages est déterminé en fonction du nombre d'éléments que l'on souhaite afficher par page et du nombre d'éléments total de la base de données.

![image](https://user-images.githubusercontent.com/72400479/159758220-8eaee2da-b394-47aa-a6bf-be9d94023d01.png)

## Téléversement
![image](https://user-images.githubusercontent.com/72400479/159755015-74bdac1c-031f-4f3a-8484-cb1aa997d67c.png)

L'ajout d'image dans la base de données est possible en appuyant sur le bouton __Choisir un fichier__ puis sur __Enregistrer__. Dans le cas où la taille de l'image est supérieure à celle acceptée par la base de données, un message d'erreur apparait.

![image](https://user-images.githubusercontent.com/72400479/159756579-ca7a1bb6-6dc3-478d-ae75-b62e40049de4.png)

Dans le cas contraire, un message confirme que l'image a bien été enregistrée.

![image](https://user-images.githubusercontent.com/72400479/159756765-cf05ca22-b604-4d4f-8627-f84b9827f9c6.png)


## Lecture récursive

La lecture récursive du dossier __docs/__ peut se faire en appuyant sur le bouton __Lecture récursive__ présent sur la page.

![image](https://user-images.githubusercontent.com/72400479/159757144-9c592931-85de-470e-87b0-a2a9ff555b2f.png)

Une fois que l'utilisateur a cliqué sur cette dernière, il se voit redirigé vers la page d'éxecution du script.

![image](https://user-images.githubusercontent.com/72400479/159757309-853835d7-75af-4c8d-ab6c-827eb494eead.png)

Un bouton de retour à l'index est présent en haut et en bas de la page. De plus, l'heure de début du processus, les étapes de ce dernier ainsi que l'heure de fin du processus sont affichés.

Sur l'index, l'arborescence du dossier __docs/__ et de son contenu est disponible.

![image](https://user-images.githubusercontent.com/72400479/160700536-06da53f9-e2d9-4618-924d-5229ac90f8df.png)

## Page administrateur

Une page administrateur est disponible à l'accès après s'être connecté depuis la page login.php.

![image](https://user-images.githubusercontent.com/72400479/160701068-2c77fbe0-59b7-4049-8be2-e7befbaaa31b.png)

La connexion est possible via l'adresse mail __admin@admin.com__ et le mot de passe __root__. Il est aussi possible de créer son propre compte avant d'accéder à la page administrateur. Cette dernière ressemble en tout point à la page index.php de base mais possède la possibilité de supprimer des images de la base de données.

![image](https://user-images.githubusercontent.com/72400479/160701492-0c30acec-8e85-4b14-9130-a221ea5ef0c8.png)


