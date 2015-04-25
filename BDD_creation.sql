DROP TABLE IF EXISTS JouePour;
DROP TABLE IF EXISTS Entraine;
DROP TABLE IF EXISTS JoueRencontre;
DROP TABLE IF EXISTS PositionJoueur;
DROP TABLE IF EXISTS Rencontre;
DROP TABLE IF EXISTS Competition;
DROP TABLE IF EXISTS Equipe;
DROP TABLE IF EXISTS Club;
DROP TABLE IF EXISTS Joueur;
DROP TABLE IF EXISTS Entraineur;
DROP TABLE IF EXISTS Personne;

CREATE TABLE IF NOT EXISTS Personne (
  n_registre  BIGINT      PRIMARY KEY,
  nom         VARCHAR(50) NOT NULL,
  prenom      VARCHAR(50) NOT NULL,
  nationalite VARCHAR(50),
  rue         VARCHAR(50),
  numero      VARCHAR(5),
  code_postal INT,
  localite    VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Entraineur (
  n_registre_entraineur BIGINT PRIMARY KEY,
  date_debut            DATE   NOT NULL
);

CREATE TABLE IF NOT EXISTS Joueur (
  n_registre_joueur BIGINT PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS Club (
  licence  BIGINT PRIMARY KEY,
  nom      VARCHAR(50) NOT NULL,
  stade    VARCHAR(50),
  pays     VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Equipe (
  id_equipe    BIGINT PRIMARY KEY,
  licence_club BIGINT      NOT NULL,
  nom          VARCHAR(50) NOT NULL,
  FOREIGN KEY (licence_club) REFERENCES Club(licence)
);

CREATE TABLE IF NOT EXISTS Competition (
  id_competition  BIGINT PRIMARY KEY,
  nom_competition VARCHAR(50) NOT NULL,
  annee           INT         NOT NULL
);

CREATE TABLE IF NOT EXISTS Rencontre (
  id_rencontre           BIGINT PRIMARY KEY,
  etape                  INT,
  date                   DATE   NOT NULL,
  id_competition         BIGINT NOT NULL,
  id_equipe_domicile     BIGINT NOT NULL,
  goals_equipe_domicile  INT    NOT NULL,
  id_equipe_exterieur    BIGINT NOT NULL,
  goals_equipe_exterieur INT    NOT NULL,
  FOREIGN KEY (id_competition)      REFERENCES Competition(id_competition),
  FOREIGN KEY (id_equipe_domicile)  REFERENCES Equipe(id_equipe),
  FOREIGN KEY (id_equipe_exterieur) REFERENCES Equipe(id_equipe)
);

CREATE TABLE IF NOT EXISTS PositionJoueur (
  n_registre_joueur  BIGINT NOT NULL,
  position           INT    NOT NULL,
  PRIMARY KEY (n_registre_joueur, position),
  FOREIGN KEY (n_registre_joueur) REFERENCES Joueur(n_registre_joueur)
);

CREATE TABLE IF NOT EXISTS JoueRencontre (
  n_registre_joueur BIGINT NOT NULL,
  id_rencontre      BIGINT NOT NULL,
  n_minutes_jouees  INT    NOT NULL,
  n_goals_marques   INT    NOT NULL,
  PRIMARY KEY (n_registre_joueur, id_rencontre),
  FOREIGN KEY (n_registre_joueur) REFERENCES Joueur(n_registre_joueur),
  FOREIGN KEY (id_rencontre)      REFERENCES Rencontre(id_rencontre)
);

CREATE TABLE IF NOT EXISTS Entraine (
  n_registre_entraineur BIGINT NOT NULL,
  id_equipe             BIGINT NOT NULL,
  annee                 INT    NOT NULL,
  PRIMARY KEY (n_registre_entraineur, id_equipe),
  FOREIGN KEY (n_registre_entraineur) REFERENCES Entraineur(n_registre_entraineur),
  FOREIGN KEY (id_equipe)             REFERENCES Equipe(id_equipe)
);

CREATE TABLE IF NOT EXISTS JouePour (
  n_registre_joueur BIGINT NOT NULL,
  annee             INT    NOT NULL,
  id_equipe         BIGINT NOT NULL,
  PRIMARY KEY (n_registre_joueur, annee, id_equipe),
  FOREIGN KEY (n_registre_joueur) REFERENCES Joueur(n_registre_joueur),
  FOREIGN KEY (id_equipe)         REFERENCES Equipe(id_equipe)
);
