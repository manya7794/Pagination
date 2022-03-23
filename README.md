# Exercice de Pagination
![image](https://user-images.githubusercontent.com/72400479/159758366-d73f449c-ad33-43e8-80c0-36fcc1482cf0.png)

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
