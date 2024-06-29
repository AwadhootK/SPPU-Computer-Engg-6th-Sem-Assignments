
import constants


class DES:

    @staticmethod
    def xor(a, b):
        return [str(int(x) ^ int(y)) for x, y in zip(a, b)]

    @staticmethod
    def list_to_matrix(lst, rows, cols):
        matrix = [lst[i:i + cols] for i in range(0, len(lst), cols)]
        return matrix

    @staticmethod
    def left_circular_shift(lst, shift_by):
        shift_by = shift_by % len(lst)
        return lst[shift_by:] + lst[:shift_by]

    @staticmethod
    def binary_to_hex(binary_str):
        if len(binary_str) % 4 != 0:
            binary_str = '0' * (4 - len(binary_str) % 4) + binary_str
        hex_value = hex(int(binary_str, 2))[2:].upper()
        return hex_value

    @staticmethod
    def hex_to_string(hex_str):
        try:
            byte_data = bytes.fromhex(hex_str)
            string_data = byte_data.decode('utf-8')
            return string_data
        except ValueError as e:
            print(f"Error: {e}")
            return None

    @staticmethod
    def permute(lst, perm):
        return [lst[i-1] for i in perm]

    def __init__(self, plain_text, key) -> None:
        self.plain_text = plain_text
        self.key = key
        self.cipher_text = ''
        self.effective_key = ''
        self.mat = []
        self.round_keys = []
        self.cipher_list = []
        self.plain_list = []

    def show_results(self, mode='encrypt'):
        if mode == 'encrypt':
            print('After Encryption')
            final_cipher = [DES.binary_to_hex(
                "".join(cipher)) for cipher in self.cipher_list]
            print(
                f'Ciphertext = {"".join(final_cipher)}')
        else:
            print('After Decryption')
            final_plain = [DES.hex_to_string(DES.binary_to_hex(
                "".join(plain))) for plain in self.plain_list]
            print(
                f'Plaintext = {"".join(final_plain).replace("~", "")}')

    def process(self, mode='encrypt'):
        if mode == 'decrypt':
            for cipher in self.cipher_list:
                self.plain_text = cipher
                self.cipher_text = ''
                self.mat = DES.list_to_matrix(self.plain_text, 8, 8)
                self.mat = DES.permute(
                    [j for i in self.mat for j in i], constants.initial_perm)
                self.Nround(round=1, mode=mode)
                self.cipher_text = DES.permute(
                    [j for i in self.mat for j in i], constants.final_perm)
                self.plain_list.append(self.cipher_text)
        else:
            self.initialize_key_generation()
            mat_list, text_list = self.get_matrix(mode=mode)
            for mat, text in zip(mat_list, text_list):
                self.plain_text = text
                self.mat = DES.permute(
                    [j for i in mat for j in i], constants.initial_perm)
                self.Nround(round=1, mode=mode)
                self.cipher_text = DES.permute(
                    self.cipher_text, constants.final_perm)
                self.cipher_list.append(self.cipher_text)
        self.show_results(mode=mode)

    def initialize_key_generation(self):
        key_mat = [bit for hex_bit in self.key for bit in bin(int(hex_bit, 16))[2:].zfill(4)]
        self.effective_key = DES.permute(key_mat, constants.keyp)

    def get_matrix(self, mode='encrypt'):
        self.plain_text += '~' * (8 - len(self.plain_text) % 8)
        mat = []

        if mode == 'decrypt':
            for char in self.plain_text:
                bin_bit = bin(int(char, 16))[2:].zfill(4)
                mat.append([bit for bit in bin_bit])
        else:
            def split_string(input_string):
                return [input_string[i:i+8] for i in range(0, len(input_string), 8)]

            text_list = split_string(self.plain_text)
            mat_list = []

            for part in text_list:
                mat = []
                for index, char in enumerate(part.encode().hex()): #!imp
                    bin_bit = bin(int(char, 16))[2:].zfill(4)
                    if index % 2 == 0:
                        mat.append([bit for bit in bin_bit])
                    else:
                        mat[-1].extend([bit for bit in bin_bit])
                mat_list.append(mat)
        return mat_list, text_list

    def mangler_func(self, right_bits, round, mode='encrypt'):
        def substitution_box(right_bits):
            right_matrix = DES.list_to_matrix(right_bits, 8, 6)
            for i in range(8):
                row = int(right_matrix[i][0] + right_matrix[i][-1], 2)
                col = int(''.join(right_matrix[i][1:5]), 2)
                sbox_val = constants.sbox[i][row][col]
                right_matrix[i] = bin(sbox_val)[2:].zfill(4)
            return [j for i in right_matrix for j in i]

        right_bits = DES.permute(right_bits, constants.exp_d)
        round_key = self.generate_round_keys(
            round=round) if mode == 'encrypt' else self.round_keys[16 - round]
        right_bits = DES.xor(right_bits, round_key)
        right_bits = substitution_box(right_bits)
        right_bits = DES.permute(right_bits, constants.per)
        return right_bits

    def Nround(self, round, mode):
        if round == 17:
            return
        bits = [j for i in self.mat for j in i]  # flattened

        right_bits_old = bits[32:]

        left_bits, right_bits = bits[:32], self.mangler_func(
            right_bits_old, round=round, mode=mode)
        right_bits_new = DES.xor(left_bits, right_bits)
        self.cipher_text = right_bits_old + \
            right_bits_new if round != 16 else right_bits_new + right_bits_old
        self.mat = DES.list_to_matrix(self.cipher_text, 8, 8)
        self.Nround(round+1, mode=mode)

    def generate_round_keys(self, round):
        left, right = self.effective_key[:28], self.effective_key[28:]
        left = DES.left_circular_shift(
            left, constants.shift_table[round - 1])
        right = DES.left_circular_shift(
            right, constants.shift_table[round - 1])
        self.effective_key = left + right
        round_key = DES.permute(self.effective_key, constants.key_comp)
        self.round_keys.append(round_key)
        return round_key


def menu():
    des: DES = None
    while True:
        print("\nMenu:")
        print("1. Encrypt")
        print("2. Decrypt")
        print("3. Exit")
        choice = input("Enter your choice (1/2/3): ")

        if choice == '1':
            plain_text = input("Enter plaintext: ")
            key = "AABB09182736CCDD"
            des = DES(plain_text=plain_text, key=key)
            des.process(mode='encrypt')
        elif choice == '2':
            des.process(mode='decrypt')
        elif choice == '3':
            print("Exiting program...")
            break
        else:
            print("Invalid choice. Please enter 1, 2, or 3.")
        print('='*70)


if __name__ == '__main__':
    menu()
