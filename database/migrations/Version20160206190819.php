<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20160206190819 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE field ADD CONSTRAINT FK_5BF54558B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE field ADD CONSTRAINT FK_5BF54558896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5BF54558B03A8386 ON field (created_by_id)');
        $this->addSql('CREATE INDEX IDX_5BF54558896DBBDE ON field (updated_by_id)');
        $this->addSql('ALTER TABLE deployment_plan ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE deployment_plan ADD CONSTRAINT FK_71733FBAB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE deployment_plan ADD CONSTRAINT FK_71733FBA896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_71733FBAB03A8386 ON deployment_plan (created_by_id)');
        $this->addSql('CREATE INDEX IDX_71733FBA896DBBDE ON deployment_plan (updated_by_id)');
        $this->addSql('ALTER TABLE issue_type ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE issue_type ADD CONSTRAINT FK_D4399FE5B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE issue_type ADD CONSTRAINT FK_D4399FE5896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D4399FE5B03A8386 ON issue_type (created_by_id)');
        $this->addSql('CREATE INDEX IDX_D4399FE5896DBBDE ON issue_type (updated_by_id)');
        $this->addSql('ALTER TABLE users_in_projects ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE users_in_projects ADD CONSTRAINT FK_ECDFF30AB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE users_in_projects ADD CONSTRAINT FK_ECDFF30A896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_ECDFF30AB03A8386 ON users_in_projects (created_by_id)');
        $this->addSql('CREATE INDEX IDX_ECDFF30A896DBBDE ON users_in_projects (updated_by_id)');
        $this->addSql('ALTER TABLE dashboard ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE dashboard ADD CONSTRAINT FK_5C94FFF8B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dashboard ADD CONSTRAINT FK_5C94FFF8896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5C94FFF8B03A8386 ON dashboard (created_by_id)');
        $this->addSql('CREATE INDEX IDX_5C94FFF8896DBBDE ON dashboard (updated_by_id)');
        $this->addSql('ALTER TABLE kanban_board ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE kanban_board ADD CONSTRAINT FK_AA902B95B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE kanban_board ADD CONSTRAINT FK_AA902B95896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AA902B95B03A8386 ON kanban_board (created_by_id)');
        $this->addSql('CREATE INDEX IDX_AA902B95896DBBDE ON kanban_board (updated_by_id)');
        $this->addSql('ALTER TABLE notification_templates ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE notification_templates ADD CONSTRAINT FK_C9C13AD1B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification_templates ADD CONSTRAINT FK_C9C13AD1896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C9C13AD1B03A8386 ON notification_templates (created_by_id)');
        $this->addSql('CREATE INDEX IDX_C9C13AD1896DBBDE ON notification_templates (updated_by_id)');
        $this->addSql('ALTER TABLE sprint ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE sprint ADD CONSTRAINT FK_EF8055B7B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sprint ADD CONSTRAINT FK_EF8055B7896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EF8055B7B03A8386 ON sprint (created_by_id)');
        $this->addSql('CREATE INDEX IDX_EF8055B7896DBBDE ON sprint (updated_by_id)');
        $this->addSql('ALTER TABLE operations ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE operations ADD CONSTRAINT FK_28145348B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE operations ADD CONSTRAINT FK_28145348896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_28145348B03A8386 ON operations (created_by_id)');
        $this->addSql('CREATE INDEX IDX_28145348896DBBDE ON operations (updated_by_id)');
        $this->addSql('ALTER TABLE plan_tasks ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE plan_tasks ADD CONSTRAINT FK_3FE206BB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plan_tasks ADD CONSTRAINT FK_3FE206B896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3FE206BB03A8386 ON plan_tasks (created_by_id)');
        $this->addSql('CREATE INDEX IDX_3FE206B896DBBDE ON plan_tasks (updated_by_id)');
        $this->addSql('ALTER TABLE status ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651C896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7B00651CB03A8386 ON status (created_by_id)');
        $this->addSql('CREATE INDEX IDX_7B00651C896DBBDE ON status (updated_by_id)');
        $this->addSql('ALTER TABLE plan_task_types ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE plan_task_types ADD CONSTRAINT FK_F3F9A806B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plan_task_types ADD CONSTRAINT FK_F3F9A806896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F3F9A806B03A8386 ON plan_task_types (created_by_id)');
        $this->addSql('CREATE INDEX IDX_F3F9A806896DBBDE ON plan_task_types (updated_by_id)');
        $this->addSql('ALTER TABLE role ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_57698A6AB03A8386 ON role (created_by_id)');
        $this->addSql('CREATE INDEX IDX_57698A6A896DBBDE ON role (updated_by_id)');
        $this->addSql('ALTER TABLE agile_board ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE agile_board ADD CONSTRAINT FK_440602CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE agile_board ADD CONSTRAINT FK_440602C896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_440602CB03A8386 ON agile_board (created_by_id)');
        $this->addSql('CREATE INDEX IDX_440602C896DBBDE ON agile_board (updated_by_id)');
        $this->addSql('ALTER TABLE transition ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE transition ADD CONSTRAINT FK_F715A75AB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transition ADD CONSTRAINT FK_F715A75A896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F715A75AB03A8386 ON transition (created_by_id)');
        $this->addSql('CREATE INDEX IDX_F715A75A896DBBDE ON transition (updated_by_id)');
        $this->addSql('ALTER TABLE workflow ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE workflow ADD CONSTRAINT FK_65C59816B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workflow ADD CONSTRAINT FK_65C59816896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_65C59816B03A8386 ON workflow (created_by_id)');
        $this->addSql('CREATE INDEX IDX_65C59816896DBBDE ON workflow (updated_by_id)');
        $this->addSql('ALTER TABLE user ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649B03A8386 ON user (created_by_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649896DBBDE ON user (updated_by_id)');
        $this->addSql('ALTER TABLE projects ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5C93B3A4B03A8386 ON projects (created_by_id)');
        $this->addSql('CREATE INDEX IDX_5C93B3A4896DBBDE ON projects (updated_by_id)');
        $this->addSql('ALTER TABLE server ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE server ADD CONSTRAINT FK_5A6DD5F6B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE server ADD CONSTRAINT FK_5A6DD5F6896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A6DD5F6B03A8386 ON server (created_by_id)');
        $this->addSql('CREATE INDEX IDX_5A6DD5F6896DBBDE ON server (updated_by_id)');
        $this->addSql('ALTER TABLE diagram_package ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE diagram_package ADD CONSTRAINT FK_48F06E5CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE diagram_package ADD CONSTRAINT FK_48F06E5C896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_48F06E5CB03A8386 ON diagram_package (created_by_id)');
        $this->addSql('CREATE INDEX IDX_48F06E5C896DBBDE ON diagram_package (updated_by_id)');
        $this->addSql('ALTER TABLE stage ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369B03A8386 ON stage (created_by_id)');
        $this->addSql('CREATE INDEX IDX_C27C9369896DBBDE ON stage (updated_by_id)');
        $this->addSql('ALTER TABLE widget ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE widget ADD CONSTRAINT FK_85F91ED0B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE widget ADD CONSTRAINT FK_85F91ED0896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_85F91ED0B03A8386 ON widget (created_by_id)');
        $this->addSql('CREATE INDEX IDX_85F91ED0896DBBDE ON widget (updated_by_id)');
        $this->addSql('ALTER TABLE diagram ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE diagram ADD CONSTRAINT FK_D75D8360B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE diagram ADD CONSTRAINT FK_D75D8360896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D75D8360B03A8386 ON diagram (created_by_id)');
        $this->addSql('CREATE INDEX IDX_D75D8360896DBBDE ON diagram (updated_by_id)');
        $this->addSql('ALTER TABLE issue ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233EB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_12AD233EB03A8386 ON issue (created_by_id)');
        $this->addSql('CREATE INDEX IDX_12AD233E896DBBDE ON issue (updated_by_id)');
        $this->addSql('ALTER TABLE version ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3B03A8386 ON version (created_by_id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3896DBBDE ON version (updated_by_id)');
        $this->addSql('ALTER TABLE build_plan ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE build_plan ADD CONSTRAINT FK_DA263697B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE build_plan ADD CONSTRAINT FK_DA263697896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DA263697B03A8386 ON build_plan (created_by_id)');
        $this->addSql('CREATE INDEX IDX_DA263697896DBBDE ON build_plan (updated_by_id)');
        $this->addSql('ALTER TABLE diagram_category ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE diagram_category ADD CONSTRAINT FK_E462FBDCB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE diagram_category ADD CONSTRAINT FK_E462FBDC896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E462FBDCB03A8386 ON diagram_category (created_by_id)');
        $this->addSql('CREATE INDEX IDX_E462FBDC896DBBDE ON diagram_category (updated_by_id)');
        $this->addSql('ALTER TABLE comment ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526CB03A8386 ON comment (created_by_id)');
        $this->addSql('CREATE INDEX IDX_9474526C896DBBDE ON comment (updated_by_id)');
        $this->addSql('ALTER TABLE notifications ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6000B0D3B03A8386 ON notifications (created_by_id)');
        $this->addSql('CREATE INDEX IDX_6000B0D3896DBBDE ON notifications (updated_by_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agile_board DROP FOREIGN KEY FK_440602CB03A8386');
        $this->addSql('ALTER TABLE agile_board DROP FOREIGN KEY FK_440602C896DBBDE');
        $this->addSql('DROP INDEX IDX_440602CB03A8386 ON agile_board');
        $this->addSql('DROP INDEX IDX_440602C896DBBDE ON agile_board');
        $this->addSql('ALTER TABLE agile_board ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE build_plan DROP FOREIGN KEY FK_DA263697B03A8386');
        $this->addSql('ALTER TABLE build_plan DROP FOREIGN KEY FK_DA263697896DBBDE');
        $this->addSql('DROP INDEX IDX_DA263697B03A8386 ON build_plan');
        $this->addSql('DROP INDEX IDX_DA263697896DBBDE ON build_plan');
        $this->addSql('ALTER TABLE build_plan ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB03A8386');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C896DBBDE');
        $this->addSql('DROP INDEX IDX_9474526CB03A8386 ON comment');
        $this->addSql('DROP INDEX IDX_9474526C896DBBDE ON comment');
        $this->addSql('ALTER TABLE comment ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE dashboard DROP FOREIGN KEY FK_5C94FFF8B03A8386');
        $this->addSql('ALTER TABLE dashboard DROP FOREIGN KEY FK_5C94FFF8896DBBDE');
        $this->addSql('DROP INDEX IDX_5C94FFF8B03A8386 ON dashboard');
        $this->addSql('DROP INDEX IDX_5C94FFF8896DBBDE ON dashboard');
        $this->addSql('ALTER TABLE dashboard ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE deployment_plan DROP FOREIGN KEY FK_71733FBAB03A8386');
        $this->addSql('ALTER TABLE deployment_plan DROP FOREIGN KEY FK_71733FBA896DBBDE');
        $this->addSql('DROP INDEX IDX_71733FBAB03A8386 ON deployment_plan');
        $this->addSql('DROP INDEX IDX_71733FBA896DBBDE ON deployment_plan');
        $this->addSql('ALTER TABLE deployment_plan ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE diagram DROP FOREIGN KEY FK_D75D8360B03A8386');
        $this->addSql('ALTER TABLE diagram DROP FOREIGN KEY FK_D75D8360896DBBDE');
        $this->addSql('DROP INDEX IDX_D75D8360B03A8386 ON diagram');
        $this->addSql('DROP INDEX IDX_D75D8360896DBBDE ON diagram');
        $this->addSql('ALTER TABLE diagram ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE diagram_category DROP FOREIGN KEY FK_E462FBDCB03A8386');
        $this->addSql('ALTER TABLE diagram_category DROP FOREIGN KEY FK_E462FBDC896DBBDE');
        $this->addSql('DROP INDEX IDX_E462FBDCB03A8386 ON diagram_category');
        $this->addSql('DROP INDEX IDX_E462FBDC896DBBDE ON diagram_category');
        $this->addSql('ALTER TABLE diagram_category ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE diagram_package DROP FOREIGN KEY FK_48F06E5CB03A8386');
        $this->addSql('ALTER TABLE diagram_package DROP FOREIGN KEY FK_48F06E5C896DBBDE');
        $this->addSql('DROP INDEX IDX_48F06E5CB03A8386 ON diagram_package');
        $this->addSql('DROP INDEX IDX_48F06E5C896DBBDE ON diagram_package');
        $this->addSql('ALTER TABLE diagram_package ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE field DROP FOREIGN KEY FK_5BF54558B03A8386');
        $this->addSql('ALTER TABLE field DROP FOREIGN KEY FK_5BF54558896DBBDE');
        $this->addSql('DROP INDEX IDX_5BF54558B03A8386 ON field');
        $this->addSql('DROP INDEX IDX_5BF54558896DBBDE ON field');
        $this->addSql('ALTER TABLE field ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233EB03A8386');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233E896DBBDE');
        $this->addSql('DROP INDEX IDX_12AD233EB03A8386 ON issue');
        $this->addSql('DROP INDEX IDX_12AD233E896DBBDE ON issue');
        $this->addSql('ALTER TABLE issue ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE issue_type DROP FOREIGN KEY FK_D4399FE5B03A8386');
        $this->addSql('ALTER TABLE issue_type DROP FOREIGN KEY FK_D4399FE5896DBBDE');
        $this->addSql('DROP INDEX IDX_D4399FE5B03A8386 ON issue_type');
        $this->addSql('DROP INDEX IDX_D4399FE5896DBBDE ON issue_type');
        $this->addSql('ALTER TABLE issue_type ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE kanban_board DROP FOREIGN KEY FK_AA902B95B03A8386');
        $this->addSql('ALTER TABLE kanban_board DROP FOREIGN KEY FK_AA902B95896DBBDE');
        $this->addSql('DROP INDEX IDX_AA902B95B03A8386 ON kanban_board');
        $this->addSql('DROP INDEX IDX_AA902B95896DBBDE ON kanban_board');
        $this->addSql('ALTER TABLE kanban_board ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE notification_templates DROP FOREIGN KEY FK_C9C13AD1B03A8386');
        $this->addSql('ALTER TABLE notification_templates DROP FOREIGN KEY FK_C9C13AD1896DBBDE');
        $this->addSql('DROP INDEX IDX_C9C13AD1B03A8386 ON notification_templates');
        $this->addSql('DROP INDEX IDX_C9C13AD1896DBBDE ON notification_templates');
        $this->addSql('ALTER TABLE notification_templates ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3B03A8386');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3896DBBDE');
        $this->addSql('DROP INDEX IDX_6000B0D3B03A8386 ON notifications');
        $this->addSql('DROP INDEX IDX_6000B0D3896DBBDE ON notifications');
        $this->addSql('ALTER TABLE notifications ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE operations DROP FOREIGN KEY FK_28145348B03A8386');
        $this->addSql('ALTER TABLE operations DROP FOREIGN KEY FK_28145348896DBBDE');
        $this->addSql('DROP INDEX IDX_28145348B03A8386 ON operations');
        $this->addSql('DROP INDEX IDX_28145348896DBBDE ON operations');
        $this->addSql('ALTER TABLE operations ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE plan_task_types DROP FOREIGN KEY FK_F3F9A806B03A8386');
        $this->addSql('ALTER TABLE plan_task_types DROP FOREIGN KEY FK_F3F9A806896DBBDE');
        $this->addSql('DROP INDEX IDX_F3F9A806B03A8386 ON plan_task_types');
        $this->addSql('DROP INDEX IDX_F3F9A806896DBBDE ON plan_task_types');
        $this->addSql('ALTER TABLE plan_task_types ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE plan_tasks DROP FOREIGN KEY FK_3FE206BB03A8386');
        $this->addSql('ALTER TABLE plan_tasks DROP FOREIGN KEY FK_3FE206B896DBBDE');
        $this->addSql('DROP INDEX IDX_3FE206BB03A8386 ON plan_tasks');
        $this->addSql('DROP INDEX IDX_3FE206B896DBBDE ON plan_tasks');
        $this->addSql('ALTER TABLE plan_tasks ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4B03A8386');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4896DBBDE');
        $this->addSql('DROP INDEX IDX_5C93B3A4B03A8386 ON projects');
        $this->addSql('DROP INDEX IDX_5C93B3A4896DBBDE ON projects');
        $this->addSql('ALTER TABLE projects ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AB03A8386');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A896DBBDE');
        $this->addSql('DROP INDEX IDX_57698A6AB03A8386 ON role');
        $this->addSql('DROP INDEX IDX_57698A6A896DBBDE ON role');
        $this->addSql('ALTER TABLE role ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE server DROP FOREIGN KEY FK_5A6DD5F6B03A8386');
        $this->addSql('ALTER TABLE server DROP FOREIGN KEY FK_5A6DD5F6896DBBDE');
        $this->addSql('DROP INDEX IDX_5A6DD5F6B03A8386 ON server');
        $this->addSql('DROP INDEX IDX_5A6DD5F6896DBBDE ON server');
        $this->addSql('ALTER TABLE server ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE sprint DROP FOREIGN KEY FK_EF8055B7B03A8386');
        $this->addSql('ALTER TABLE sprint DROP FOREIGN KEY FK_EF8055B7896DBBDE');
        $this->addSql('DROP INDEX IDX_EF8055B7B03A8386 ON sprint');
        $this->addSql('DROP INDEX IDX_EF8055B7896DBBDE ON sprint');
        $this->addSql('ALTER TABLE sprint ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369B03A8386');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369896DBBDE');
        $this->addSql('DROP INDEX IDX_C27C9369B03A8386 ON stage');
        $this->addSql('DROP INDEX IDX_C27C9369896DBBDE ON stage');
        $this->addSql('ALTER TABLE stage ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651CB03A8386');
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651C896DBBDE');
        $this->addSql('DROP INDEX IDX_7B00651CB03A8386 ON status');
        $this->addSql('DROP INDEX IDX_7B00651C896DBBDE ON status');
        $this->addSql('ALTER TABLE status ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE transition DROP FOREIGN KEY FK_F715A75AB03A8386');
        $this->addSql('ALTER TABLE transition DROP FOREIGN KEY FK_F715A75A896DBBDE');
        $this->addSql('DROP INDEX IDX_F715A75AB03A8386 ON transition');
        $this->addSql('DROP INDEX IDX_F715A75A896DBBDE ON transition');
        $this->addSql('ALTER TABLE transition ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B03A8386');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649896DBBDE');
        $this->addSql('DROP INDEX IDX_8D93D649B03A8386 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649896DBBDE ON user');
        $this->addSql('ALTER TABLE user ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE users_in_projects DROP FOREIGN KEY FK_ECDFF30AB03A8386');
        $this->addSql('ALTER TABLE users_in_projects DROP FOREIGN KEY FK_ECDFF30A896DBBDE');
        $this->addSql('DROP INDEX IDX_ECDFF30AB03A8386 ON users_in_projects');
        $this->addSql('DROP INDEX IDX_ECDFF30A896DBBDE ON users_in_projects');
        $this->addSql('ALTER TABLE users_in_projects ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3B03A8386');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3896DBBDE');
        $this->addSql('DROP INDEX IDX_BF1CD3C3B03A8386 ON version');
        $this->addSql('DROP INDEX IDX_BF1CD3C3896DBBDE ON version');
        $this->addSql('ALTER TABLE version ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE widget DROP FOREIGN KEY FK_85F91ED0B03A8386');
        $this->addSql('ALTER TABLE widget DROP FOREIGN KEY FK_85F91ED0896DBBDE');
        $this->addSql('DROP INDEX IDX_85F91ED0B03A8386 ON widget');
        $this->addSql('DROP INDEX IDX_85F91ED0896DBBDE ON widget');
        $this->addSql('ALTER TABLE widget ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
        $this->addSql('ALTER TABLE workflow DROP FOREIGN KEY FK_65C59816B03A8386');
        $this->addSql('ALTER TABLE workflow DROP FOREIGN KEY FK_65C59816896DBBDE');
        $this->addSql('DROP INDEX IDX_65C59816B03A8386 ON workflow');
        $this->addSql('DROP INDEX IDX_65C59816896DBBDE ON workflow');
        $this->addSql('ALTER TABLE workflow ADD created_by DATETIME NOT NULL, ADD updated_by DATETIME NOT NULL, DROP created_by_id, DROP updated_by_id');
    }
}