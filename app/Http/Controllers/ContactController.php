<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function createContact(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $contact = Contact::create($request->all());


        return response()->json([
            "message" => "contact created",
            "data" => $contact
        ], 201);
    }

    public function getContacts()
    {
        $contacts = Contact::all();

        if ($contacts->isEmpty()) {
            return response()->json(['message' => 'Aucun contact trouvé'], 404);
        }
        return response()->json([
            'success' => true,
            'service' => 'Contacts API',
            'message' => 'Listes des contacts',
            'contacts' => $contacts,
        ], 200);
    }

   

    public function getContactById($contact_id)
    {
        $contact = Contact::find($contact_id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contact trouvé',
            'data' => $contact
        ]);
    }

    public function updateContact(Request $request, $contact_id)
    {
        $contact = Contact::findOrFail($contact_id);

        $contact->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Contact mis à jour',
            'data' => $contact
        ]);
    }

    public function deleteContact($contact_id)
    {
        $contact = Contact::find($contact_id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact introuvable'
            ], 404);
        }

        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact supprimé',
            'data' => $contact
        ], 200);
    }
}
