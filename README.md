# Lanos 1.0 API Framework

Planning to build a SaaS package? Need to deploy a secure API for an idea you have and need to do it quickly.

### Look No Further!

This framework was designed to deploy quickly and easily. And has been used on all projects by NuLead and Lanos.

### What's Included?

- Eloquent Object Relationship Mapping
- oAuth 2.0, password and client_credentials flows.
- Easy Dependancy Injection
- Easy Auth Guard / Middleware Configuration
- Resource Owner Middleware protection
- Pre-configured for CORS.

# COMING SOON
    An azure container image for this framework!

## Installation

    php composer.phar create-project lanos/api-framework [my-app-name]

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.

### Database Creation

You need to create a database, ensure the app has access and configure it in src/settings.php.

Then inside that database create the following schema.

    CREATE TABLE oauth_clients (
      client_id             VARCHAR(80)   NOT NULL,
      client_secret         VARCHAR(80),
      redirect_uri          VARCHAR(2000),
      grant_types           VARCHAR(80),
      scope                 VARCHAR(4000),
      user_id               VARCHAR(80),
      PRIMARY KEY (client_id)
    );
    
    CREATE TABLE oauth_access_tokens (
      access_token         VARCHAR(40)    NOT NULL,
      client_id            VARCHAR(80)    NOT NULL,
      user_id              VARCHAR(80),
      expires              TIMESTAMP      NOT NULL,
      scope                VARCHAR(4000),
      PRIMARY KEY (access_token)
    );
    
    CREATE TABLE oauth_authorization_codes (
      authorization_code  VARCHAR(40)     NOT NULL,
      client_id           VARCHAR(80)     NOT NULL,
      user_id             VARCHAR(80),
      redirect_uri        VARCHAR(2000),
      expires             TIMESTAMP       NOT NULL,
      scope               VARCHAR(4000),
      id_token            VARCHAR(1000),
      PRIMARY KEY (authorization_code)
    );
    
    CREATE TABLE oauth_refresh_tokens (
      refresh_token       VARCHAR(40)     NOT NULL,
      client_id           VARCHAR(80)     NOT NULL,
      user_id             VARCHAR(80),
      expires             TIMESTAMP       NOT NULL,
      scope               VARCHAR(4000),
      PRIMARY KEY (refresh_token)
    );
    
    CREATE TABLE oauth_users (
      username            VARCHAR(80),
      password            VARCHAR(80),
      first_name          VARCHAR(80),
      last_name           VARCHAR(80),
      email               VARCHAR(80),
      email_verified      BOOLEAN,
      scope               VARCHAR(4000),
      PRIMARY KEY (username)
    );
    
    CREATE TABLE oauth_scopes (
      scope               VARCHAR(80)     NOT NULL,
      is_default          BOOLEAN,
      PRIMARY KEY (scope)
    );
    
    CREATE TABLE oauth_jwt (
      client_id           VARCHAR(80)     NOT NULL,
      subject             VARCHAR(80),
      public_key          VARCHAR(2000)   NOT NULL
    );

### Running The Application

To run the application in development, you can run these commands 

	cd [my-app-name]
	php composer.phar start

Run this command in the application directory to run the test suite

	php composer.phar test

That's it! Now go build something cool.
