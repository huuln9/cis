import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/place_controller.dart';

class PlaceBind extends Bindings {
  final String placeTagId;

  PlaceBind({required this.placeTagId});

  @override
  void dependencies() {
    Get.lazyPut<PlaceController>(() => PlaceController(placeTagId: placeTagId));
  }
}
