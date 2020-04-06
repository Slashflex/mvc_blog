-- Ce fichier sert à initialiser la base de données

-- Structure de la table "posts"
CREATE TABLE posts (
	id serial NOT NULL,
	title varchar(255) NOT NULL,
	content text NOT NULL,
	creation_date timestamp NOT NULL,
	CONSTRAINT pk_pos PRIMARY KEY (id)
);

-- Déchargement des données de la table "posts"
INSERT INTO posts (title, content, creation_date) VALUES
('Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2017-09-18 16:28:41'),
('Le PHP à la conquête du monde !', E'C''est officiel, l''éléPHPant a annoncé à la radio hier soir "J''ai l''intention de conquérir le monde !".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu''il n''en fallait pour dire "éléPHPant". Pas dur, ceci dit entre nous...', '2017-09-20 16:28:41');


-- Structure de la table "comments"
CREATE TABLE comments (
    id serial NOT NULL,
    post_id int NOT NULL,
    author varchar(255) NOT NULL,
    comment text NOT NULL,
    comment_date timestamp NOT NULL,
	CONSTRAINT pk_com PRIMARY KEY (id)
);

-- Déchargement des données de la table "comments"
INSERT INTO comments (post_id, author, comment, comment_date) VALUES
(2, 'Mathieu', 'Preum''s', '2017-09-24 17:12:30'),
(2, 'Sam', 'Quelqu''un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2017-09-24 17:21:34'),
(1, 'Jojo', 'C''est moi !', '2017-09-28 19:50:14'),
(2, 'Mathieu', E'Retest\r\nEncore', '2017-10-27 11:46:50'),
(2, 'Sam', 'tu testes quoi ?', '2017-10-27 15:44:14');
