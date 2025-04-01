# Code Runners - Project Specification and Roadmap

## Project Overview
Code Runners is an open-source PHP automation platform that allows users to create, manage, and schedule PHP script automations on their own servers.

## Technology Stack
- Framework: CodeIgniter 4
- Authentication: CodeIgniter Shield
- Task Management: CodeIgniter Tasks
- Queue System: CodeIgniter Queue

## Version 0.1 Specification

### Core Features

#### 1. Authentication System
- Email-based login
- Password reset functionality
- Basic user profile management

#### 2. Automation Management
- Create new automations
- Update existing automations
- Delete automations
- Automated generation of `__Automations.php` files in a dedicated directory

#### 3. Code Editing Capabilities
- Web-based code editor for automations
- Direct file editing interface
- Syntax highlighting

#### 4. Scheduling System
- Daily scheduling for automations
- Cron-like interface for defining run times
- Basic scheduling options:
  - Run once per day
  - Specific time of day selection
  - Timezone support

#### 5. Dashboard
- List of all created automations
- Basic statistics
  - Total automations
  - Active/Inactive automations
  - Recent execution logs

#### 6. Execution Environment
- Integration with CodeIgniter Tasks
- Basic execution logging
- Error capture and reporting

### Technical Requirements
- PHP 8.1+
- CodeIgniter 4.6+
- Composer dependency management
- MySQL/MariaDB database support

### Security Considerations
- CSRF protection
- Input validation
- Secure file permissions for automation scripts

## Development Roadmap for V0.1

### Week 1: Project Setup and Authentication
- [x] Initialize CodeIgniter 4 project
- [x] Set up CodeIgniter Shield
- [x] Configure authentication flows
- [x] Create user registration and login pages
- [x] Implement basic user profile management

### Week 2: Automation Management
- [X] Design database schema for automations
- [X] Create CRUD interfaces for automations
- [X] Implement file generation mechanism for `__Automations.php`
- [ ] Develop web-based code editor
- [ ] Add basic syntax validation

### Week 3: Scheduling and Execution
- [ ] Integrate CodeIgniter Tasks
- [ ] Develop scheduling interface
- [ ] Implement daily scheduling mechanism
- [ ] Create basic execution logging system
- [ ] Add error handling and reporting

### Week 4: Dashboard and Polishing
- [X] Design and implement dashboard
- [ ] Add automation listing and management views
- [ ] Implement basic statistics tracking
- [ ] Perform initial security audits
- [ ] Prepare documentation
- [X] Create initial README and installation guide

## Potential Future Enhancements (Beyond V0.1)
- Multiple scheduling frequencies (weekly, monthly)
- Task queuing system
- More advanced code editing features
- Webhook integrations
- Comprehensive monitoring and alerting
- Multi-server support

## Contribution Guidelines
- Detailed contribution guidelines will be added to the repository
- Code must follow PSR-12 coding standards
- All contributions require unit tests
- Documentation updates are mandatory with feature additions

## Licensing
- Open-source license (MIT/Apache recommended)
- Clear contribution and usage guidelines

## Recommended Development Environment
- PHP 8.1+
- Composer
- MySQL/MariaDB
- VS Code (recommended for development)
- Git for version control

## Installation (Preliminary)
```bash
# Clone the repository
git clone https://github.com/blue-panel/code-runners.git

# Install dependencies
composer install

# Configure environment
cp env .env
# Edit .env with your configuration

# Run migrations
php spark migrate

# Start development server
php spark serve
```

## Notes for V0.1
- Focus on core functionality and stability
- Prioritize security and basic feature completeness
- Prepare for future extensibility
