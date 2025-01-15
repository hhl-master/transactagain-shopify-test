<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopify App Test Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            padding: 20px;
        }
        .dashboard {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="my-4 text-center">Shopify App Test Dashboard</h1>

        <div class="dashboard">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">$1,234.56</p>
                            <button class="btn btn-primary">Refresh</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text">45</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewDetailsModal">View Details</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</h5>
                            <p class="card-text">12</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#manageUsersModal">Manage Users</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Recent Orders</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <button class="btn btn-secondary">Export Data</button>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addOrderModal">Add Order</button>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1001</td>
                                        <td>Jane Doe</td>
                                        <td>$120.50</td>
                                        <td>Shipped</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal" onclick="showOrderDetails('#1001', 'Jane Doe', '$120.50', 'Shipped')">View</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" onclick="setDeleteTarget('#1001')">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#1002</td>
                                        <td>John Smith</td>
                                        <td>$85.00</td>
                                        <td>Pending</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal" onclick="showOrderDetails('#1002', 'John Smith', '$85.00', 'Pending')">View</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" onclick="setDeleteTarget('#1002')">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#1003</td>
                                        <td>Sarah Lee</td>
                                        <td>$45.75</td>
                                        <td>Delivered</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal" onclick="showOrderDetails('#1003', 'Sarah Lee', '$45.75', 'Delivered')">View</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" onclick="setDeleteTarget('#1003')">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- View Details Modal -->
    <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDetailsModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Details about orders will be displayed here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Order ID:</strong> <span id="order-id"></span></p>
                    <p><strong>Customer:</strong> <span id="order-customer"></span></p>
                    <p><strong>Total:</strong> <span id="order-total"></span></p>
                    <p><strong>Status:</strong> <span id="order-status"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="delete-target"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="deleteOrder()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Users Modal -->
    <div class="modal fade" id="manageUsersModal" tabindex="-1" aria-labelledby="manageUsersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageUsersModalLabel">Manage Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>User management features will be displayed here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Order Modal -->
    <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Add New Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addOrderForm">
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="orderTotal" class="form-label">Total</label>
                            <input type="number" step="0.01" class="form-control" id="orderTotal" required>
                        </div>
                        <div class="mb-3">
                            <label for="orderStatus" class="form-label">Status</label>
                            <select class="form-select" id="orderStatus" required>
                                <option value="Pending">Pending</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="addOrder()">Add Order</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showOrderDetails(orderId, customer, total, status) {
            document.getElementById('order-id').textContent = orderId;
            document.getElementById('order-customer').textContent = customer;
            document.getElementById('order-total').textContent = total;
            document.getElementById('order-status').textContent = status;
        }

        let deleteTarget = "";

        function setDeleteTarget(orderId) {
            deleteTarget = orderId;
            document.getElementById('delete-target').textContent = orderId;
        }

        function deleteOrder() {
            alert(`Order ${deleteTarget} has been deleted.`);
            // Implement actual deletion logic here
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
            deleteModal.hide();
        }

        function addOrder() {
            const customerName = document.getElementById('customerName').value;
            const orderTotal = document.getElementById('orderTotal').value;
            const orderStatus = document.getElementById('orderStatus').value;

            if (customerName && orderTotal && orderStatus) {
                alert(`Order added successfully:\nCustomer: ${customerName}\nTotal: $${orderTotal}\nStatus: ${orderStatus}`);
                // Implement actual add order logic here
                const addOrderModal = bootstrap.Modal.getInstance(document.getElementById('addOrderModal'));
                addOrderModal.hide();
                document.getElementById('addOrderForm').reset();
            } else {
                alert('Please fill out all fields before adding an order.');
            }
        }
    </script>

</body>
</html>
