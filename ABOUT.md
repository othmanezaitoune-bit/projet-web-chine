# ℹ️ À propos du projet "Bienvenue en Chine"

## 🎓 Contexte Académique
Ce projet a été développé dans le cadre du module universitaire **"Programmation Web"**. L'objectif pédagogique était de concevoir une application web dynamique complète (Full-Stack) **sans utiliser de frameworks** (comme Laravel ou Symfony), afin de maîtriser les fondamentaux du langage PHP et les interactions avec une base de données relationnelle.

## 💡 Philosophie de Conception

### 1. Approche "Native"
Le choix du **PHP natif** est délibéré. Il permet de comprendre les mécanismes sous-jacents du développement web :
* Gestion manuelle des sessions et des cookies.
* Protection contre les failles XSS et Injections SQL via `PDO`.
* Compréhension du routage et des inclusions de fichiers (`header.php`, `footer.php`).

### 2. Charte Graphique "Nature & Zen"
Nous avons opté pour une identité visuelle apaisante, loin des clichés rouges et or parfois trop agressifs.
* **Vert Jade (#2E8B57) :** Symbolise la nature, les rizières et le bambou.
* **Bleu Ciel (#5DADE2) :** Évoque l'ouverture, le ciel et les rivières.
* **Gris Brume (#ECEFF1) :** Assure une lisibilité optimale et une touche de modernité.

### 3. Architecture "Vertical Slicing"
Le travail a été réparti non pas par couche technique (Front vs Back), mais par **fonctionnalité**. Chaque membre du binôme a ainsi pu toucher à toute la stack technique (de la base de données au CSS) sur ses modules respectifs (ex: Module Actualités vs Module Contact).

## 🛠️ Défis Techniques Relevés

* **Sécurité :** Mise en place d'un système d'authentification robuste pour l'administration (hachage de mot de passe).
* **Responsive Design :** Création d'une grille CSS flexible qui passe de 3 colonnes (Desktop) à 1 colonne (Mobile) sans framework CSS (comme Bootstrap).
* **Interactivité :** Validation des formulaires côté client (JavaScript) et côté serveur (PHP) pour une double sécurité.
* **Persistance des données :** Conception d'une base de données relationnelle MySQL optimisée.

## 🚀 Pistes d'Amélioration (V2)

Si ce projet devait évoluer, voici les prochaines étapes envisagées :
* **Architecture MVC :** Migrer le code "spaghetti" vers une structure Modèle-Vue-Contrôleur stricte.
* **AJAX :** Charger les actualités ou soumettre les formulaires sans recharger la page.
* **API Météo :** Intégrer une API tierce pour afficher la météo en temps réel à Pékin ou Shanghai.
* **Upload d'images :** Permettre à l'administrateur de télécharger ses propres photos pour les articles via le formulaire CRUD.

---
*Développé avec passion pour découvrir le Web et la Chine.*
