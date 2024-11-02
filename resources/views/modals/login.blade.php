<div class="modal fade" id="loginModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <p class="modal-title" id="staticBackdropLabel">
                Login
            </p>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >

            </button>
        </div>
        <div class="modal-body">

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
          <div class="row p-5">
            <div class="form-group inputBox col-12 col-sm-12 col-lg-12">
              <input type="tel" name="phone" class="form-control-lg" required />
              <span>Número de Telefone</span>
            </div>
            <div class="form-group inputBox col-12 col-sm-12 col-lg-12 mt-3">
              <input type="password" name="password" class="form-control-lg" required id="id_password" />
              <i class="uil uil-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
              <span>Password</span>
            </div>
            <div class="form-group col-12 col-sm-12 col-lg-12 mt-4">
              <button class="form-control form-control-lg" style="background: #cca332de;">
                Iniciar Sessão
              </button>
            </div>

            <div class="mt-4 remember__password">
              <label for="remember">
                <input type="checkbox" id="remember" name="remember" />
                Lembrar-me
              </label>
            </div>

            <div class="col-lg-12">
              <hr />
              <p class="mt-2 text-center">
                Não tenho uma conta? <a href="{{ route('register1') }}" style="color: #cca332de;">Criar conta</a>
              </p>
            </div>
          </div>
        </form>
        </div>
    </div>
</div>
</div>
