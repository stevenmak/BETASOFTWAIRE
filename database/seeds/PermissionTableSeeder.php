<?php
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'contact-list','contact-create','contact-edit','contact-delete',
            'departement-list','departement-create','departement-edit','departement-delete',
            'depense-list','depense-create','depense-edit','depense-delete',
            'devis-list','devis-create','devis-edit','devis-delete',
            'echange-list','echange-create','echange-edit','echange-delete',
            'etape-list','etape-create','etape-edit','etape-delete',
            'materiel-list','materiel-create','materiel-edit','materiel-delete',
            'paiement-list','paiement-create','paiement-edit','paiement-delete',
            'projet-list','projet-create','projet-edit','projet-delete',
            'service-list','service-create','service-edit','service-delete',
            'taches-list','taches-create','taches-edit','taches-delete'
         ];
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
