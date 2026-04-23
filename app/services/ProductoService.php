<?php
require_once BASE_PATH . '/app/repository/ProductoRepository.php';
require_once BASE_PATH . '/app/models/Producto.php';

class ProductoService
{
    private $productoRepository;

    public function __construct()
    {
        $this->productoRepository = new ProductoRepository();
    }

    public function getProductAllDetails()
    {
        return $this->getProductsDetailsByQuery(null, null);
    }

    public function getProductsByCategoryDetails($idCategoria)
    {
        return $this->getProductsDetailsByQuery($idCategoria, null);
    }

    public function getProductsBySearchDetails($query)
    {
        return $this->getProductsDetailsByQuery(null, $query);
    }

    private function getProductsDetailsByQuery($idCategoria = null, $searchQuery = null)
    {
        if ($idCategoria) {
            $products = $this->productoRepository->getProductsByCategory($idCategoria);
        } else if ($searchQuery) {
            $products = $this->productoRepository->searchProducts($searchQuery);
        } else {
            $products = $this->productoRepository->getAllProducts();
        }

        $detailsProducts = $this->productoRepository->getAllProductsDetails();
        $listaProductos = [];

        $detallesPorId = [];
        foreach ($detailsProducts as $detail) {
            $idProducto = $detail['id_producto'];
            $detallesPorId[$idProducto][] = $detail;
        }

        foreach ($products as $producto) {
            $objetoProducto = new Producto(
                $producto['id_producto'],
                $producto['id_categoria'],
                $producto['nombre_producto'],
                $producto['descripcion'],
                $producto['precio_unitario'],
                $producto['url_imagen']
            );

            $detallesProductoActual = $detallesPorId[$producto['id_producto']] ?? [];
            foreach ($detallesProductoActual as $detalles) {
                $objetoProducto->cantidad_stock += $detalles['stock'];

                if (!in_array($detalles['color'], $objetoProducto->coloresDisponibles)) $objetoProducto->coloresDisponibles[] = $detalles['color'];

                if (!in_array($detalles['talla'], $objetoProducto->tallasDisponibles)) $objetoProducto->tallasDisponibles[] = $detalles['talla'];
            }

            $listaProductos[] = $objetoProducto;
        }

        return $listaProductos;
    }

    public function getProductIdDetail($id)
    {
        $producto = $this->productoRepository->getProductID($id);
        $detallesProducto = $this->productoRepository->getProductDetailID($id);
        if (!$producto) return null;

        $objetoProducto = new Producto(
            $producto['id_producto'],
            $producto['nombre_categoria'],
            $producto['nombre_producto'],
            $producto['descripcion'],
            $producto['precio_unitario'],
            $producto['url_imagen']
        );

        foreach ($detallesProducto as $detalles) {
            $objetoProducto->cantidad_stock += $detalles['stock'];

            if (!in_array($detalles['color'], $objetoProducto->coloresDisponibles)) $objetoProducto->coloresDisponibles[] = $detalles['color'];

            if (!in_array($detalles['talla'], $objetoProducto->tallasDisponibles)) $objetoProducto->tallasDisponibles[] = $detalles['talla'];
        }

        return $objetoProducto;
    }
}
