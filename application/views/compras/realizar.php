    <?php $this->load->view('layout/header'); ?>
    <?php $this->load->view('layout/navbar'); ?>

    <div class="container-fluid form-container-compras">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mi-h3"><i class="fas fa-shopping-cart"></i> Registro de Compra</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('compras/guardar') ?>" method="post" class="needs-validation" novalidate>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label for="proveedor" class="form-label label-compras">Proveedor</label>
                                    <select id="proveedor" name="id_proveedores" class="form-select-custom" required>
                                        <option value="" disabled <?= empty($proveedor_id) ? 'selected' : '' ?>>Seleccionar</option>
                                        <?php foreach ($proveedores as $pr): ?>
                                            <option value="<?= $pr->id_proveedores ?>" <?= ($proveedor_id == $pr->id_proveedores) ? 'selected' : '' ?>><?= $pr->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione un proveedor.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="mb-3 mi-h4">Carrito</h4>
                            <div class="table-responsive">
                                <table class="table table-striped-columns table-bordered table-p">
                                    <thead>
                                        <tr>
                                            <th width="23%">Producto</th>
                                            <th width="3%">Cantidad</th>
                                            <th width="17%">Precio Unitario</th>
                                            <th width="20%">Lote</th>
                                            <th width="10%">Fecha Vencimiento</th>
                                            <th width="17%">Subtotal</th>
                                            <th width="10%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="productosBody" class="table-group-divider">
                                        <?php
                                        // Verificamos si hay datos POST, lo que significa que el formulario fue enviado y probablemente falló la validación.
                                        $lotes_enviados = $this->input->post('lote');
                                        if (!empty($lotes_enviados)) :
                                            // Si hay datos, recorremos los lotes para reconstruir cada fila
                                            foreach ($lotes_enviados as $i => $lote) :
                                                // Obtenemos los demás datos de la misma fila usando el índice $i
                                                $id_producto = set_value("ids_productos[$i]");
                                                // Convertimos a número para poder calcular
                                                $cantidad = (float) set_value("cantidad[$i]", 0);
                                                $precio = (float) set_value("precio_unitario[$i]", 0);
                                                $fecha_vencimiento = set_value("fecha_vencimiento[$i]");
                                                $nombre_producto = set_value("nombres_productos[$i]");
                                                $marca_producto = set_value("marcas_productos[$i]");
                                                // Calculamos el subtotal
                                                $subtotal = $cantidad * $precio;
                                        ?>
                                                <tr class="fila-producto">
                                                    <td>
                                                        <input type="hidden" name="ids_productos[]" class="producto-id" value="<?= $id_producto ?>">
                                                        <input type="hidden" name="nombres_productos[]" value="<?= $nombre_producto ?>">
                                                        <input type="hidden" name="marcas_productos[]" value="<?= $marca_producto ?>">
                                                        <div><strong><?= $nombre_producto ?></strong></div>
                                                        <small class="text-muted"><?= $marca_producto ?></small>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control-custom cantidad" name="cantidad[]" value="<?= $cantidad ?>" min="1" step="1" required>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control-custom precio" name="precio_unitario[]" value="<?= $precio ?>" min="0" step="0.01" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control-custom lote-input" name="lote[]" value="<?= set_value("lote[$i]") ?>" required>
                                                        <div class="text-danger"><?= form_error("lote[$i]") ?></div>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control-custom fecha-vencimiento-input" name="fecha_vencimiento[]" value="<?= $fecha_vencimiento ?>" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control-custom subtotal" value="<?= number_format($subtotal, 2, ',', '') ?>" readonly placeholder="0.00">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-secondary btn-asignar aumentar-cantidad"><i class="fa-solid fa-plus"></i></button>
                                                        <button type="button" class="btn btn-sm btn-danger btn-eliminar eliminar-fila">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                        else :
                                            // Si no hay datos POST (primera carga), mostramos la fila inicial como la tenías
                                            ?>
                                            <tr class="fila-producto">
                                                <td>
                                                    <input type="hidden" name="ids_productos[]" class="producto-id">
                                                    <button type="button" class="btn btn-sm btn-buscar" data-bs-toggle="modal" data-bs-target="#modalProductos"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control-custom cantidad" name="cantidad[]" min="1" step="1" placeholder="0" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control-custom precio" name="precio_unitario[]" min="0" step="0.01" placeholder="0.00" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control-custom lote-input" name="lote[]" required>
                                                    <div class="text-danger"></div>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control-custom fecha-vencimiento-input" name="fecha_vencimiento[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control-custom subtotal" readonly placeholder="0.00">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-secondary btn-asignar aumentar-cantidad"><i class="fa-solid fa-plus"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger btn-eliminar eliminar-fila" disabled>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <button type="button" id="agregarProducto" class="btn btn-danger btn-eliminar"><i class="fa-solid fa-cart-plus"></i> Agregar Producto</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body mi-card-body">
                                            <div class="row">
                                                <div class="col-6"><strong>SUBTOTAL:</strong></div>
                                                <div class="col-6 text-right">
                                                    <strong id="subtotalGeneral">$0.00</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><strong>IVA:</strong></div>
                                                <div class="col-6 text-right">
                                                    <strong id="ivaGeneral">$0.00</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><strong>TOTAL:</strong></div>
                                                <div class="col-6 text-right">
                                                    <strong id="totalGeneral">$0.00</strong>
                                                    <input type="hidden" name="total" id="totalInput">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="<?php echo base_url('compras'); ?>" class="btn btn-secondary btn-asignar">
                                        <i class="fas fa-times"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-secondary btn-guardar-c ml-2">
                                        <i class="fas fa-save"></i> Guardar Compra
                                    </button>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalProductos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Lista de Productos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="mensaje-proveedor" class="alert alert-warning" style="display: none;">
                                                <i class="fas fa-exclamation-triangle"></i>
                                                Por favor, seleccione un proveedor primero.
                                            </div>
                                            <div id="mensaje-producto" class="alert alert-danger" style="display: none;">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                                Por favor, seleccione un producto primero.
                                            </div>
                                            <div id="table-modal" class="table-responsive mt-4 mi-table">
                                                <table class="table table-p table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Marca</th>
                                                            <th scope="col">Precio</th>
                                                            <th scope="col">Categoría</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($productos as $p): ?>
                                                            <tr>
                                                                <td><input class="form-check-input" type="radio" name="id_productos" value="<?= $p->id_productos ?>"></td>
                                                                <td><?= $p->nombre ?></td>
                                                                <td><?= $p->marca_nombre ?></td>
                                                                <td><?= $p->precio_compra ?></td>
                                                                <td id="categoria_nombre"><?= $p->categoria_nombre ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-secondary btn-editar" id="btnSeleccionar">Seleccionar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('proveedor').addEventListener('change', function() {
            let idProveedor = this.value;
            if (idProveedor) {
                window.location.href = "<?= base_url('compras/realizar/') ?>" + idProveedor;
            }
        });

        // Variable para almacenar el producto seleccionado
        let productoSeleccionado = null;
        let filaActual = null; // Para saber en qué fila se está seleccionando el producto
        let fila = null; // Para recordar qué fila ocultar

        // Detectar cuando se selecciona un radio button en el modal
        document.addEventListener('click', function(e) {
            if (e.target.type === 'radio' && e.target.name === 'id_productos') {
                // Obtener la fila del producto seleccionado
                fila = e.target.closest('tr');

                // Guardar los datos del producto
                productoSeleccionado = {
                    id: e.target.value,
                    nombre: fila.cells[1].textContent, // Columna Nombre
                    marca: fila.cells[2].textContent, // Columna Marca  
                    precio: fila.cells[3].textContent, // Columna Precio
                    categoria: fila.cells[4].textContent // Columna Categoría
                };

                if (productoSeleccionado.categoria === 'Lácteos' || productoSeleccionado.categoria === 'Carnes' || productoSeleccionado.categoria === 'Despensa' || productoSeleccionado.categoria === 'Bebidas' || productoSeleccionado.categoria === 'Congelados') {
                    filaActual.querySelector('.lote-input').required = true;
                    filaActual.querySelector('.fecha-vencimiento-input').required = true;
                } else {
                    filaActual.querySelector('.lote-input').required = false;
                    filaActual.querySelector('.fecha-vencimiento-input').required = false;
                }
            }
        });

        // Cuando se abre el modal
        document.getElementById('modalProductos').addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            filaActual = button.closest('.fila-producto');

            const proveedorSelect = document.getElementById('proveedor');
            const mensajeProveedor = document.getElementById('mensaje-proveedor');
            const tablaModal = document.getElementById('table-modal');

            if (!proveedorSelect.value) {
                mensajeProveedor.style.display = 'block';
                tablaModal.style.display = 'none';
                document.getElementById('btnSeleccionar').disabled = true;
            } else {
                mensajeProveedor.style.display = 'none';
                tablaModal.style.display = 'block';
            }
        });


        // Función para cuando se hace clic en "Seleccionar"
        document.getElementById('btnSeleccionar').addEventListener('click', function() {
            if (productoSeleccionado && filaActual) {

                // Llenar el input hidden con el ID del producto
                filaActual.querySelector('.producto-id').value = productoSeleccionado.id;

                // Mostrar información del producto seleccionado
                const celdaProducto = filaActual.querySelector('td:first-child');
                celdaProducto.innerHTML = `
                <input type="hidden" name="ids_productos[]" class="producto-id" value="${productoSeleccionado.id}">
                <input type="hidden" name="nombres_productos[]" value="${productoSeleccionado.nombre}">
                <input type="hidden" name="marcas_productos[]" value="${productoSeleccionado.marca}">
                <div><strong>${productoSeleccionado.nombre}</strong></div>
                <small class="text-muted">${productoSeleccionado.marca}</small>
            `;

                // Llenar el precio automáticamente (quitar el símbolo $ si existe)
                const precioLimpio = productoSeleccionado.precio.replace('$', '').replace(',', '');
                filaActual.querySelector('.precio').value = precioLimpio;


                // OCULTAR el producto del modal para que no se pueda volver a seleccionar
                fila.style.display = 'none';

                // Cerrar el modal
                bootstrap.Modal.getInstance(document.getElementById('modalProductos')).hide();

                // Limpiar selección para próxima vez
                productoSeleccionado = null;
                filaActual = null;
                fila = null;

                const mensajeProducto = document.getElementById('mensaje-producto');
                mensajeProducto.style.display = 'none';
                
            } else {
                const mensajeProducto = document.getElementById('mensaje-producto');
                mensajeProducto.style.display = 'block';
            }
        });

        // Agregar nueva fila de producto
        document.getElementById('agregarProducto').addEventListener('click', function() {
            const nuevaFila = `
            <tr class="fila-producto">
                <td>
                    <input type="hidden" name="ids_productos[]" class="producto-id">
                    <button type="button" class="btn btn-sm btn-buscar" data-bs-toggle="modal" data-bs-target="#modalProductos"><i class="fa-solid fa-magnifying-glass"></i></button>
                </td>
                <td>
                    <input type="number" class="form-control-custom cantidad" name="cantidad[]" min="1" step="1" placeholder="0" required  >
                </td>
                <td>
                    <input type="number" class="form-control-custom precio" name="precio_unitario[]" min="0" step="0.01" placeholder="0.00" readonly>
                </td>
                <td>
                    <input type="text"class="form-control-custom lote-input" name="lote[]" required>
                    <div class="text-danger"></div>
                </td>
                <td>
                    <input type="date"  class="form-control-custom fecha-vencimiento-input" name="fecha_vencimiento[]" required>
                </td>
                <td>
                    <input type="text" class="form-control-custom subtotal" readonly placeholder="0.00">
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-secondary btn-asignar aumentar-cantidad" onclick="aumentarCantidad()"><i class="fa-solid fa-plus"></i></button>
                    <button type="button" class="btn btn-sm btn-danger btn-eliminar eliminar-fila">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
            document.getElementById('productosBody').insertAdjacentHTML('beforeend', nuevaFila);
            actualizarBotonesEliminar();
        });

        // BONUS: Función para mostrar el producto de nuevo si lo eliminan del carrito
        function mostrarProductoEnModal(productoId) {
            // Buscar la fila oculta por el ID del producto
            const filas = document.querySelectorAll('#modalProductos tbody tr');
            filas.forEach(fila => {
                const radio = fila.querySelector('input[type="radio"]');
                const mensajeProducto = document.getElementById('mensaje-producto');
                if (radio && radio.value === productoId) {
                    fila.style.display = ''; // Mostrar la fila de nuevo
                    mensajeProducto.style.display = 'none';
                }
            });
        }

        // Eliminar fila
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('eliminar-fila') || e.target.parentElement.classList.contains('eliminar-fila')) {
                const fila = e.target.closest('tr');
                const productoId = fila.querySelector('.producto-id').value;
                fila.remove();
                // Mostrar el producto de nuevo en el modal
                if (productoId) {
                    mostrarProductoEnModal(productoId);
                }
                actualizarBotonesEliminar();
                calcularTotal();
            }
        });

        function actualizarBotonesEliminar() {
            const filas = document.querySelectorAll('.fila-producto');
            filas.forEach((fila, index) => {
                const boton = fila.querySelector('.eliminar-fila');
                boton.disabled = filas.length === 1;
            });
        }

        // Calcular subtotales y total
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('cantidad') || e.target.classList.contains('precio')) {
                const fila = e.target.closest('tr');
                const cantidad = parseFloat(fila.querySelector('.cantidad').value) || 0;
                const precio = parseFloat(fila.querySelector('.precio').value) || 0;
                const subtotal = cantidad * precio;

                fila.querySelector('.subtotal').value = subtotal.toLocaleString('es-CO', {
                    minimumFractionDigits: 2
                });
                calcularTotal();
            }
        });

        function calcularTotal() {
            let subtotal = 0;

            document.querySelectorAll('.fila-producto').forEach(fila => {
                const cantidad = parseFloat(fila.querySelector('.cantidad').value) || 0;
                const precio = parseFloat(fila.querySelector('.precio').value) || 0;
                subtotal += cantidad * precio;
            });

            const iva = subtotal * 0.19; // 19% IVA
            const total = subtotal + iva;

            document.getElementById('subtotalGeneral').textContent = '$' + subtotal.toLocaleString('es-CO', {
                minimumFractionDigits: 2
            });
            document.getElementById('ivaGeneral').textContent = '$' + iva.toLocaleString('es-CO', {
                minimumFractionDigits: 2
            });
            document.getElementById('totalGeneral').textContent = '$' + total.toLocaleString('es-CO', {
                minimumFractionDigits: 2
            });
            document.getElementById('totalInput').value = total;
        }

        // Aumentar cantidad
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('aumentar-cantidad') || e.target.parentElement.classList.contains('aumentar-cantidad')) {
                const fila = e.target.closest('tr');
                const cantidadInput = fila.querySelector('.cantidad');
                const productoId = fila.querySelector('.producto-id').value;
                cantidadInput.value = (parseInt(fila.querySelector('.cantidad').value) || 0) + 1;
                const eventoInput = new Event('input', {
                    bubbles: true
                });
                cantidadInput.dispatchEvent(eventoInput);
                calcularTotal();
            }
        });
    </script>

    <script>
        // Le decimos al navegador que espere a que todo el HTML esté cargado.
        document.addEventListener('DOMContentLoaded', function() {
            // Una vez que la página está lista, llamamos a tu función.
            // Ella se encargará de leer los subtotales que PHP ya imprimió y calcular el total general.
            calcularTotal();
            actualizarBotonesEliminar();
        });
    </script>
    <?php $this->load->view('layout/footer'); ?>