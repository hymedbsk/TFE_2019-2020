@extends('layouts.post')

<header class="masthead">
    <div class="intro-text">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                <h3 class="panel-title">Liste des utilisateurs</h3>
               <p>
                         <img src="https://www.che2-ephec.be/img/che2head.png" alt="logo che2">

              </p>

                                 </div>
            <div class="card-body">
                        <table class="table">
                          <thead>
                                <th class="scope">Matricule</th>
                                <th class="scope">Email</th>
                          </thead>
                          <tbody>
                                                                 <tr>
                                      <td class="text-primary"><strong>HE201620</strong></td>
                                      <td class="text-primary"><strong>a.chelle@students.ephec.be</strong></td>
                                      <td><a href="https://www.che2-ephec.be/user/2/edit" class="btn btn-warning btn-block">Modifier</a></td>
                                      <td>
                                        <form method="POST" action="https://www.che2-ephec.be/user/2" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="hq46yohI2XuCIBFdM0wkR938FlAri8M7yM9ziGh0">
                                        <input class="btn btn-danger btn-block" onclick="return confirm(&#039;Vraiment supprimer cet utilisateur ?&#039;)" type="submit" value="Supprimer">
                                        </form> </td>
                         <td>

                            <form method="POST" action="https://www.che2-ephec.be/user/2?method=put" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="hq46yohI2XuCIBFdM0wkR938FlAri8M7yM9ziGh0">
                        <input class="btn btn-success btn-block" onclick="return confirm(&#039;Vraiment le passer membre ?&#039;)" type="submit" value="Passer membre">
                        </form>
                   </td>
                  <td>


                                        <form method="POST" action="https://www.che2-ephec.be/user/2?method=put" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="hq46yohI2XuCIBFdM0wkR938FlAri8M7yM9ziGh0">
                                        <input class="btn btn-warning btn-block" onclick="return confirm(&#039;Vraiment le retirer des membres ?&#039;)" type="submit" value="Enlever membre">
                                        </form>
                  </td>

                                  </tr>
                                                            <tr>
                                      <td class="text-primary"><strong>he000000</strong></td>
                                      <td class="text-primary"><strong>hymedcool@live.fr</strong></td>
                                      <td><a href="https://www.che2-ephec.be/user/3/edit" class="btn btn-warning btn-block">Modifier</a></td>
                                      <td>
                                        <form method="POST" action="https://www.che2-ephec.be/user/3" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="hq46yohI2XuCIBFdM0wkR938FlAri8M7yM9ziGh0">
                                        <input class="btn btn-danger btn-block" onclick="return confirm(&#039;Vraiment supprimer cet utilisateur ?&#039;)" type="submit" value="Supprimer">
                                        </form> </td>
                         <td>

                            <form method="POST" action="https://www.che2-ephec.be/user/3?method=put" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="hq46yohI2XuCIBFdM0wkR938FlAri8M7yM9ziGh0">
                        <input class="btn btn-success btn-block" onclick="return confirm(&#039;Vraiment le passer membre ?&#039;)" type="submit" value="Passer membre">
                        </form>
                   </td>
                  <td>


                                        <form method="POST" action="https://www.che2-ephec.be/user/3?method=put" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="hq46yohI2XuCIBFdM0wkR938FlAri8M7yM9ziGh0">
                                        <input class="btn btn-warning btn-block" onclick="return confirm(&#039;Vraiment le retirer des membres ?&#039;)" type="submit" value="Enlever membre">
                                        </form>
                  </td>

                                  </tr>
                                                  </tbody>
                  </table>
              </div>
              <a href="https://www.che2-ephec.be/user/create" class="btn btn-info pull-right">Ajouter un utilisateur</a>

          </div>
          </div>
      </div>
     </div>
    </div>
  </header>

@endsection
