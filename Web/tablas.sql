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
        
        FOREIGN KEY (address_id) REFERENCES address(address_id)
);

CREATE TABLE company (
        user_id INTEGER,
        cuit INTEGER,
        phone INTEGER,
        company_name TEXT,
        sector_id INTEGER,
        
        PRIMARY KEY (cuit),
        UNIQUE (user_id),
        FOREIGN KEY (user_id) REFERENCES _user,
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
        FOREIGN KEY (user_id) REFERENCES _user
);