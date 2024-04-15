This repository contains a Symfony 7 project Text Magic test task.
## Getting Started

These instructions will help you set up and run the project on your local machine.

### Prerequisites

- Docker, Docker Compose

### Installing

1. Run docker:

   ```bash
   docker compose up --build -d
   
2. Go into worker's container console:

   ```bash
   docker exec -it php-worker bash

3. Inside container create db, run migrations and run fixtures:
    ```bash
    bin/console doctrine:database:create &&
    bin/console doctrine:migrations:migrate -q &&
    bin/console doctrine:fixtures:load -q

4. Now you are ready to reach http://localhost/test/:
5. Before you commit, please run cs-fixer:

   ```bash
   ./vendor/bin/php-cs-fixer fix src --allow-risky=yes
