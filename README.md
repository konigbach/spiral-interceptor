# My awesome Cli application

Hello developer! Welcome to your new awesome `Cli` application built with the Spiral framework.

We're excited that you've chosen Spiral for your project and we hope that our installer package has made the
installation process a breeze.

To help you get started, we've provided some instructions for configuring the individual packages that were installed.
Depending on the packages you chose during the installation, you'll find the following next steps:

## Configuration

### Environment variables

- Please, configure the environment variables in the `.env` file at the application's root.


### RoadRunnerBridge

- The settings for RoadRunner are in a file `.rr.yaml` at the main folder of the app.
- Documentation: https://spiral.dev/docs/start-server


## Usage

To create your first command effortlessly, use the scaffolding command:

```bash
php app.php create:command FirstCommand
```

After executing this command, a new command class will be created in the `src/Endpoint/Console/Command` directory. The
class will look like this:

```php
namespace App\Endpoint\Console;

use Spiral\Console\Attribute\Argument;
use Spiral\Console\Attribute\AsCommand;
use Spiral\Console\Attribute\Option;
use Spiral\Console\Attribute\Question;
use Spiral\Console\Command;

#[AsCommand(name: 'first')]
final class FirstCommand extends Command
{
    public function __invoke(): int
    {
        // Put your command logic here
        $this->info('Command logic is not implemented yet');

        return self::SUCCESS;
    }
}
```

To invoke your command, run the following command in the console:

```bash
php app.php first
```

Read more about commands in the [Spiral documentation](https://spiral.dev/docs/console-commands).


### RoadRunner Queue server

Before you can start the queue server, you need to configure it.

#### Queue broker configuration

Firs of all, you need to configure the queue broker. All information about the queue broker configuration can be found
in the [RoadRunner documentation](https://roadrunner.dev/docs/queues-overview).


#### Spiral configuration

You can read more about the configuration options in
the [Spiral documentation](https://spiral.dev/docs/queue-roadrunner/current/en).

#### Starting the queue server

To start the queue server using RoadRunner, run the following command in your project directory:

```bash
./rr serve
```


## Console commands

#### To invoke application command just run:

```bash
php app.php command:name
```

#### To get a list of available commands:

```bash
php app.php list
```

#### To get help about a particular command:

```bash
php app.php help command:name
```


### Download or update RoadRunner

Allows to install the latest version of the RoadRunner compatible with your environment (operating system, processor
architecture, runtime, etc...).

```bash
composer rr:download
# or
./vendor/bin/rr get-binary
```

## Useful resources

- [**Spiral Framework documentation**](https://spiral.dev/docs)
- [**Roadmap of Learning Spiral Framework**](https://spiral.dev/roadmap) - For all the newcomers who are eager to dive into the Spiral Environment, this roadmap will be your guiding star. We understand the challenges beginners face, and with this structured path, our aim is to simplify your learning journey.
- [**RoadRunner documentation**](https://roadrunner.dev/docs)
- [Community packages](https://github.com/spiral-packages)
- [Buggregator](https://github.com/buggregator/server) — OpenSource tool that offers a range of debugging features for Long running PHP applications.
- [Birddog](https://github.com/roadrunner-server/birddog) — OpenSource tool for monitoring RoadRunner instances.
- [Support us](https://github.com/sponsors/roadrunner-server)
- [Contributing](https://spiral.dev/docs/about-contributing/)

## Project Structure

If you chose to install the default application skeleton, your project will have the following directory structure:

```
- Endpoint
    - Web
        - UserController.php
        - Filter
            - CreateUserFilter.php
        - Middleware
            - LocaleMiddleware.php
        - Interceptor
            - ValidateFiltersInterceptor.php
        - routes.php
    - Console
        - Interceptor
            - PromptRequiredArguments.php
        - CreateUserCommand.php
    - RPC
        - ...
    - Temporal
        - Workflow
            - ...
        - Activity
            - ...
- Application
    - Bootloader
        - RoutesBootloader.php
        - UserModuleBootloader.php
    - Exception
        - SomeException.php
        - Renderer
            - ViewRenderer.php
    - AppDirectories.php
    - Kernel.php
- Domain
    - User
        - Entity
            - User.php
        - Service
            - StoreUserService.php
        - Repository
            - UserRepositoryInterface.php
        - Exception
            - UserNotFoundException.php
- Infrastructure
    - Persistence
        - CycleUserRepository.php
    - CycleORM
        - Typecaster
            - UuidTypecast.php
    - Interceptor
        - LogInterceptor.php
        - ExceptionHandlerInterceptor.php
```

#### Here's a brief explanation of the directories and files in this structure:

- **Endpoint**: This directory contains the entry points for your application, including HTTP endpoints (in the Web
  subdirectory), command-line interfaces (in the Console subdirectory), and gRPC services (in the RPC subdirectory).

- **Application**: This directory contains the core of your application, including the Kernel class that boots your
  application, the Bootloader classes that register services with the container, and the Exception directory that
  contains exception handling logic.

- **Domain**: This directory contains your domain logic, organized by subdomains. For example, an Entity for the User
  model, a Service for storing new users, a Repository for fetching users from the database, and an Exception for
  handling user-related errors.

- **Infrastructure**: This directory contains the infrastructure code for your application, including the Persistence
  directory for database-related code, the CycleORM directory for ORM-related code, and the Interceptor directory for
  global interceptors.

The project structure we provided is a common structure used in many PHP applications, and it can serve as a starting
point for your projects By following this structure, you can organize your code in a logical and maintainable
way, making it easier to build and scale your applications over time. Of course, you may need to make adjustments to fit
the specific needs of your project, but this structure provides a solid foundation for most applications.

**Good luck with your project!**

## Support

If you have any questions or need help with the project, please don't hesitate to reach out! You can find us on Discord
at the following link:

[Discord Server](https://discord.gg/TFeEmCs)

Alternatively, you can create an issue on GitHub to report a bug or request a feature:

[Create an Issue on GitHub](https://github.com/spiral/framework/issues/new/choose)

We welcome any feedback or suggestions you may have, and are always happy to help troubleshoot any issues you may
encounter.
