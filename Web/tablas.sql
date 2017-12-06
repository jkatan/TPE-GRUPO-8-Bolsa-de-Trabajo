/*
drop table address;
drop table _user;
drop table sector;
drop table company;
drop table person;
drop table post;
*/
CREATE TABLE address (
        address_id SERIAL,
        address TEXT,
        city TEXT,
        _state TEXT,
        country TEXT,
        cp INTEGER,

        PRIMARY KEY (address, city, _state, country, cp),
        UNIQUE (address_id)
);

CREATE TABLE _user (
        user_id SERIAL,
        email TEXT,
        username TEXT,
        pass TEXT,
        address_id INTEGER,

        PRIMARY KEY (user_id),
        UNIQUE (email),

        FOREIGN KEY (address_id) REFERENCES address(address_id) ON DELETE CASCADE
);

CREATE TABLE sector (
        id SERIAL PRIMARY KEY,
        name TEXT
);

CREATE TABLE company (
        user_id INTEGER,
        cuit INTEGER,
        phone INTEGER,
        company_name TEXT,
        sector_id INTEGER,

        PRIMARY KEY (cuit),
        UNIQUE (user_id),
        FOREIGN KEY (user_id) REFERENCES _user ON DELETE CASCADE,
        FOREIGN KEY (sector_id) REFERENCES sector(id)

);

CREATE TABLE person (
        user_id INTEGER,
        dni INTEGER,
        fullname TEXT,
        surname TEXT,
        birthdate DATE,
        sex CHAR(1),

        PRIMARY KEY (dni),
        UNIQUE (user_id),
        FOREIGN KEY (user_id) REFERENCES _user ON DELETE CASCADE
);

CREATE TABLE post (
        post_id SERIAL PRIMARY KEY,
        creation_date TIMESTAMP without time zone default now(),
        title TEXT,
        location_tags TEXT,
        rol_tags TEXT,
        xp_years INTEGER,
        sector_id INTEGER,
        timeload INTEGER,
        salary_high INTEGER,
        salary_low INTEGER,
        short_desc TEXT,

        FOREIGN KEY (sector_id) REFERENCES sector(id)
);

/*Insercion de un post

insert into post(title,location_tags,rol_tags,xp_years,sector_id,timeload,salary_high,salary_low,short_desc)
values (
        'Programador Java',
        'buenos aires argentina',
        'programador',
        5,
        1,
        8,
        30000,
        25000,
        'Se busca programador JAVA con experiencia en Swing.'
);

*/
