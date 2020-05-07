<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200507145329 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE magasin_campagne (uuid_magasin VARCHAR(255) NOT NULL, uuid_campagne_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_3131FF10A3D48639 (uuid_campagne_id), PRIMARY KEY(uuid_magasin, uuid_campagne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borne_campagne (uuid_borne VARCHAR(255) NOT NULL, uuid_campagne_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_F3C45C91A3D48639 (uuid_campagne_id), PRIMARY KEY(uuid_borne, uuid_campagne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campagne (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', date_debut DATE NOT NULL, date_fin DATE NOT NULL, media VARCHAR(255) NOT NULL, recurrence VARCHAR(255) DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, duree_affichage TIME DEFAULT NULL, details LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE magasin_campagne ADD CONSTRAINT FK_3131FF10A3D48639 FOREIGN KEY (uuid_campagne_id) REFERENCES campagne (id)');
        $this->addSql('ALTER TABLE borne_campagne ADD CONSTRAINT FK_F3C45C91A3D48639 FOREIGN KEY (uuid_campagne_id) REFERENCES campagne (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE magasin_campagne DROP FOREIGN KEY FK_3131FF10A3D48639');
        $this->addSql('ALTER TABLE borne_campagne DROP FOREIGN KEY FK_F3C45C91A3D48639');
        $this->addSql('DROP TABLE magasin_campagne');
        $this->addSql('DROP TABLE borne_campagne');
        $this->addSql('DROP TABLE campagne');
    }
}
