<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\User;
use DB;
use App\Repositories\TicketRepository;

class TicketController extends Controller
{

    private $ticketRepo;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $ticket = new Ticket();

        $tickets = $this->ticketRepo->getDataByUserId($ticket, $user_id);
        return view('index', compact('tickets'));
    }


    public function create($id = null)
    {

         if(!$id)
        {
            $data['id']= '';
            return view('create');
        }
        else
    {
        $data = Ticket::where('id', $id)->first();
        return view('edit',compact('data'));
    }



    }


    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'title'=>'required',
                'description'=> 'required',
            ]);
             $data =[
                'user_id' => auth()->user()->id,
                'title' =>$request->get('title'),
                'description' =>$request->get('description'),
            ];
             $ticket = new Ticket();
            $add_ticket = $this->ticketRepo->saveData($ticket, $data);

           if($add_ticket)
           {
            return redirect()->back()->with('message', 'New support ticket has been created! Wait sometime to get resolved');
           }
        }
        catch(\Exception $e)
        {
            die($e->getMessage());
        }
    }


    public function show($id)
    {
        $ticket = Ticket::where('id', $id)->first();

        return view('show', compact('ticket'));
    }


    public function update(Request $request, $id)
    {
        try
        {
        $request->validate([
            'title'=>'required',
            'description'=> 'required',
          ]);

          $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description')
          ];
          $ticket = new Ticket();

          $update_ticket = $this->ticketRepo->updateData( $ticket, $data);
          if($update_ticket)
          {
          return redirect()->back()->with('success', 'Ticket has been updated');
          }
        }
        catch(\Exception $e)
        {
            die($e->getMessage());
        }
    }


    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect('list_ticket');
    }
}
