<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%commune}}`.
 */
class m230324_210914_create_commune_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%commune}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string('32')->unique()->notNull(),
        ]);

        $communes = [
            "Valparaíso", "Casablanca", "Concón", "Juan Fernández",
            "Puchuncaví", "Quintero", "Viña del Mar", "Isla de Pascua",
            "Los Andes", "Calle Larga", "Rinconada", "San Esteban",
            "La Ligua", "Cabildo", "Papudo", "Petorca", "Zapallar",
            "Quillota", "Calera", "Hijuelas", "La Cruz", "Nogales",
            "San Antonio", "Algarrobo", "Cartagena", "El Quisco", "El Tabo",
            "Santo Domingo", "San Felipe", "Catemu", "Llaillay", "Panquehue",
            "Putaendo", "Santa María", "Quilpué", "Limache", "Olmué",
            "Villa Alemana"
        ];

        foreach ($communes as $name) {
            $this->insert('{{%commune}}', [
                'name' => $name,
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%commune}}');
    }
}
