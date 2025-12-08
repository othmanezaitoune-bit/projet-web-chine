# 🇨🇳 Bienvenue en Chine - Site Web Touristique

**Version :** 1.0.0
**Cours :** Techniques Web et Multimédia

---

## 📖 Description

Ce projet est un site web dynamique dédié à la découverte touristique de la Chine. Il présente une interface moderne aux couleurs **Vert Jade et Bleu Ciel** ("Nature & Zen") et inclut un **Back-Office sécurisé** pour la gestion de contenu.

Le site est développé en **PHP natif** (sans framework), HTML5, CSS3 et JavaScript, avec une base de données MySQL.

---

## 🌟 Fonctionnalités

### 🌍 Partie Publique (Front-Office)
* **Design Responsive :** Site compatible mobiles et tablettes.
* **Découverte :** Pages détaillées sur les villes (Shanghai, Pékin, Guangzhou) et monuments.
* **Galerie Photos :** Grille d'images interactive.
* **Actualités :** Système de news avec **recherche par mots-clés** et **pagination**.
* **Contact :** Formulaire fonctionnel avec validation JavaScript et enregistrement en base de données.
* **Newsletter :** Module d'inscription rapide.
* **Carte :** Intégration Google Maps.

### ⚙️ Partie Administration (Back-Office)
* **Authentification :** Login sécurisé avec hachage de mot de passe (`password_verify`).
* **CRUD Actualités :** Créer, Lire, Modifier et Supprimer des articles.
* **Messagerie :** Lecture des messages reçus via le formulaire de contact.
* **Abonnés :** Visualisation de la liste des inscrits à la newsletter.

---

## 🚀 Installation

### 1. Prérequis
* Un serveur local (XAMPP, WAMP ou MAMP).
* PHP 7.4 ou supérieur.
* MySQL.

### 2. Installation des fichiers
1.  Placez le dossier du projet dans le répertoire `htdocs` (XAMPP) ou `www` (WAMP).
2.  Assurez-vous que le dossier `images/` contient bien les fichiers requis (avec les noms corrects comme `rizieres.jpg`, `shanghai_skyline.jpg`, etc.).

### 3. Base de Données
1.  Ouvrez **phpMyAdmin** (`http://localhost/phpmyadmin`).
2.  Créez une base de données nommée **`pays_website`**.
3.  Exécutez le script SQL suivant dans l'onglet "SQL" pour créer les tables et insérer les données de test :

```sql
-- Structure de la table 'News'
CREATE TABLE IF NOT EXISTS News (
  news_id int(11) NOT NULL AUTO_INCREMENT,
  titre varchar(255) NOT NULL,
  resume text DEFAULT NULL,
  contenu text NOT NULL,
  date_publication datetime DEFAULT current_timestamp(),
  PRIMARY KEY (news_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table 'Messages' (Contact)
CREATE TABLE IF NOT EXISTS Messages (
  message_id int(11) NOT NULL AUTO_INCREMENT,
  nom_complet varchar(100) NOT NULL,
  email varchar(150) NOT NULL,
  message text NOT NULL,
  date_soumission datetime DEFAULT current_timestamp(),
  PRIMARY KEY (message_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table 'Internaute' (Newsletter)
CREATE TABLE IF NOT EXISTS Internaute (
  email varchar(150) NOT NULL,
  nom varchar(100) DEFAULT 'N/A',
  prenom varchar(100) DEFAULT 'N/A',
  date_inscription datetime DEFAULT current_timestamp(),
  PRIMARY KEY (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Données de test pour les News
INSERT INTO News (titre, resume, contenu) VALUES
('Le Nouvel An Chinois approche', 'Les préparatifs pour l année du Dragon ont commencé.', 'La Chine se prépare à célébrer le nouvel an lunaire avec des festivités grandioses prévues dans tout le pays...'),
('Ouverture du nouveau parc naturel', 'Un sanctuaire pour les pandas géants.', 'Le Sichuan inaugure un nouvel espace protégé pour favoriser la reproduction des pandas géants en milieu naturel...');
🔑 Accès Administration
Pour accéder au panneau de gestion :

URL : http://localhost/votre-dossier/admin/login.php

Login : binome

Mot de passe : (Celui correspondant au hash dans le code, par défaut configurable dans login.php)

📂 Structure du Projet
/admin/                  # Fichiers de l'espace administration (sécurisé)
    ├── login.php
    ├── logout.php
    ├── news_management.php
    ├── messages.php
    └── newsletter_list.php
/css/
    └── style.css        # Feuille de style (Thème Jade/Bleu)
/images/                 # Images du site (renommées sans espaces)
/js/
    └── script.js        # Validation formulaires JS
/db_config.php           # Connexion BDD
/index.php               # Page d'accueil
/header.php              # En-tête inclus
/footer.php              # Pied de page inclus
/sidebar.php             # Menu gauche inclus
/...                     # Autres pages de contenu

Projet universitaire - Tous droits réservés 2025.
